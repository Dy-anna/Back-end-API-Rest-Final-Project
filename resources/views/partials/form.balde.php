<div class="mb-3">
    <label>Titre</label>
    <input type="text" name="title" value="{{ old('title', $event->title ?? '') }}" class="form-control">
</div>

<div class="mb-3">
    <label>Description</label>
    <textarea name="description" class="form-control">{{ old('description', $event->description ?? '') }}</textarea>
</div>

<div class="mb-3">
    <label>Lieu</label>
    <input type="text" name="location" value="{{ old('location', $event->location ?? '') }}" class="form-control">
</div>

<div class="mb-3">
    <label>Date</label>
    <input type="date" name="date" value="{{ old('date', $event->date ?? '') }}" class="form-control">
</div>

<div class="mb-3">
    <label>Catégorie</label>
    <input type="text" name="category" value="{{ old('category', $event->category ?? '') }}" class="form-control">
</div>

<div class="mb-3">
    <label>Participants max</label>
    <input type="number" name="max_participants" value="{{ old('max_participants', $event->max_participants ?? '') }}" class="form-control">
</div>
