<?php

namespace App\Console\Commands;

use App\Models\Blog;
use Illuminate\Console\Command;

class NormalizeBlogHeadings extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'blogs:normalize-headings {--dry-run : Show counts without saving} {--chunk=100 : Number of records per batch}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Shift blog heading tags down one level (h2->h1, h3->h2, h4->h3, h5->h4, h6->h5).';

    public function handle(): int
    {
        $dryRun = (bool) $this->option('dry-run');
        $chunkSize = (int) $this->option('chunk') ?: 100;

        $pattern = '/<\s*(\/?)\s*h([2-6])\b([^>]*)>/i';
        $replacer = function (array $matches): string {
            $level = max(1, ((int) $matches[2]) - 1);
            return '<' . $matches[1] . 'h' . $level . $matches[3] . '>';
        };

        $total = 0;
        $updated = 0;
        $notUpdatedIds = [];

        Blog::query()
            ->select(['id', 'description', 'short_description'])
            ->orderBy('id')
            ->chunkById($chunkSize, function ($blogs) use ($pattern, $replacer, $dryRun, &$total, &$updated, &$notUpdatedIds) {
                foreach ($blogs as $blog) {
                    $total++;
                    $updates = [];

                    if (!is_null($blog->description)) {
                        $normalized = preg_replace_callback($pattern, $replacer, $blog->description);
                        if ($normalized !== $blog->description) {
                            $updates['description'] = $normalized;
                        }
                    }

                    if (!is_null($blog->short_description)) {
                        $normalized = preg_replace_callback($pattern, $replacer, $blog->short_description);
                        if ($normalized !== $blog->short_description) {
                            $updates['short_description'] = $normalized;
                        }
                    }

                    if (!empty($updates)) {
                        $updated++;
                        if (!$dryRun) {
                            $blog->fill($updates)->save();
                        }
                    } else {
                        $notUpdatedIds[] = $blog->id;
                    }
                }
            });

        $this->info(sprintf('Processed %d blogs. %d updated.%s', $total, $updated, $dryRun ? ' (dry run)' : ''));
        if (!empty($notUpdatedIds)) {
            $this->line('Not updated IDs: ' . implode(', ', $notUpdatedIds));
        }

        return Command::SUCCESS;
    }
}
