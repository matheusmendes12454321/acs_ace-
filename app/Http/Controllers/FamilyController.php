<?php

namespace App\Http\Controllers;

use App\Models\Family;
use App\Models\FamilyMember;
use Illuminate\Http\Request;

class FamilyController extends Controller
{
    public function index(Request $request)
    {
        $query = Family::with(['microarea', 'members']);
        
        if ($request->user()->role !== 'admin' && $request->user()->microarea_id) {
            $query->where('microarea_id', $request->user()->microarea_id);
        }
        
        if ($request->has('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('street', 'like', "%{$search}%")
                  ->orWhere('neighborhood', 'like', "%{$search}%");
            });
        }
        
        return response()->json($query->paginate(20));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'street' => 'required|string',
            'number' => 'required|string',
            'neighborhood' => 'required|string',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'microarea_id' => 'required|exists:microareas,id'
        ]);

        $family = Family::create($validated);
        return response()->json($family, 201);
    }

    public function show($id)
    {
        $family = Family::with(['members', 'visits.agent', 'microarea'])->findOrFail($id);
        return response()->json($family);
    }

    public function addMember(Request $request, $familyId)
    {
        $validated = $request->validate([
            'full_name' => 'required|string',
            'birth_date' => 'required|date',
            'gender' => 'required|in:M,F',
            'risk_groups' => 'nullable|array',
            'health_conditions' => 'nullable|string'
        ]);

        $validated['family_id'] = $familyId;
        $member = FamilyMember::create($validated);
        
        return response()->json($member, 201);
    }
}