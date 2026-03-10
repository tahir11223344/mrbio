<?php

namespace App\Http\Controllers;

use App\DataTables\OfferCardDataTable;
use App\Models\Offer;
use App\Models\OfferCard;
use App\Traits\UploadImageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class OfferCardController extends Controller
{
    use UploadImageTrait;

    public function index(Offer $offer, OfferCardDataTable $dataTable)
    {
        $this->authorize('read offer');

        return $dataTable->render('pages.offer_cards.index', compact('offer'));
    }

    public function create(Offer $offer)
    {
        $this->authorize('create offer');

        return view('pages.offer_cards.create', compact('offer'));
    }

    public function store(Request $request, Offer $offer)
    {
        $this->authorize('create offer');

        $validated = $request->validate([
            'section' => 'required|in:billing-services,services',
            'section_heading' => 'nullable|string|max:255',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'feature_text' => 'nullable|string|max:255',
            'sort_order' => 'nullable|integer|min:0',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:10000',
            'image_alt' => 'nullable|string|max:255',
        ]);

        DB::beginTransaction();

        try {
            $image = null;
            if ($request->hasFile('image')) {
                $image = $this->uploadImage($request->file('image'), 'offers/cards');
            }

            OfferCard::create([
                'offer_id' => $offer->id,
                'section' => $validated['section'],
                'section_heading' => $validated['section_heading'] ?? null,
                'title' => $validated['title'],
                'description' => $validated['description'] ?? null,
                'feature_text' => $validated['feature_text'] ?? null,
                'sort_order' => $validated['sort_order'] ?? 0,
                'image' => $image,
                'image_alt' => $validated['image_alt'] ?? null,
            ]);

            DB::commit();

            return redirect()->route('admin-offer-cards.list', $offer->id)
                ->with('success', 'Offer card created successfully!');
        } catch (\Throwable $e) {
            DB::rollBack();

            Log::error('Offer Card Store Error: ' . $e->getMessage(), [
                'file' => $e->getFile(),
                'line' => $e->getLine(),
                'trace' => $e->getTraceAsString(),
            ]);

            return back()->withInput()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function edit(Offer $offer, OfferCard $card)
    {
        $this->authorize('write offer');

        if ($card->offer_id !== $offer->id) {
            return redirect()->route('admin-offer-cards.list', $offer->id)
                ->withErrors(['error' => 'Invalid offer card.']);
        }

        return view('pages.offer_cards.create', [
            'offer' => $offer,
            'data' => $card,
        ]);
    }

    public function update(Request $request, Offer $offer, OfferCard $card)
    {
        $this->authorize('write offer');

        if ($card->offer_id !== $offer->id) {
            return redirect()->route('admin-offer-cards.list', $offer->id)
                ->withErrors(['error' => 'Invalid offer card.']);
        }

        $validated = $request->validate([
            'section' => 'required|in:billing-services,services',
            'section_heading' => 'nullable|string|max:255',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'feature_text' => 'nullable|string|max:255',
            'sort_order' => 'nullable|integer|min:0',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:10000',
            'image_alt' => 'nullable|string|max:255',
        ]);

        DB::beginTransaction();

        try {
            $card->image = $this->updateImage($request, 'image', 'offers/cards', $card->image);
            $card->section = $validated['section'];
            $card->section_heading = $validated['section_heading'] ?? null;
            $card->title = $validated['title'];
            $card->description = $validated['description'] ?? null;
            $card->feature_text = $validated['feature_text'] ?? null;
            $card->sort_order = $validated['sort_order'] ?? 0;
            $card->image_alt = $validated['image_alt'] ?? null;
            $card->save();

            DB::commit();

            return redirect()->route('admin-offer-cards.list', $offer->id)
                ->with('success', 'Offer card updated successfully!');
        } catch (\Throwable $e) {
            DB::rollBack();

            Log::error('Offer Card Update Error: ' . $e->getMessage(), [
                'file' => $e->getFile(),
                'line' => $e->getLine(),
                'trace' => $e->getTraceAsString(),
            ]);

            return back()->withInput()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function destroy(Offer $offer, OfferCard $card)
    {
        $this->authorize('delete offer');

        if ($card->offer_id !== $offer->id) {
            return redirect()->route('admin-offer-cards.list', $offer->id)
                ->withErrors(['error' => 'Invalid offer card.']);
        }

        DB::beginTransaction();

        try {
            $card->delete();
            DB::commit();

            return redirect()->route('admin-offer-cards.list', $offer->id)
                ->with('success', 'Offer card deleted successfully.');
        } catch (\Throwable $e) {
            DB::rollBack();

            Log::error('Offer Card Delete Error: ' . $e->getMessage(), [
                'file' => $e->getFile(),
                'line' => $e->getLine(),
                'trace' => $e->getTraceAsString(),
            ]);

            return back()->withErrors(['error' => 'Failed to delete the offer card: ' . $e->getMessage()]);
        }
    }
}
