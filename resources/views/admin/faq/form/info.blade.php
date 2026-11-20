<div class="card">
    <div class="card-body">
        <fieldset class="border rounded-3 p-3">
            <legend>Question & Answer</legend>
            <div class="mb-3">
                <label class="form-label">Question (English) <span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="question" value="{{ old('question', $row ? $row->question : '') }}" required placeholder="e.g. What products does Munaa Krishi supply?">
            </div>

            <div class="mb-3">
                <label class="form-label">Nepali Question</label>
                <input type="text" class="form-control" name="nepali_question" value="{{ old('nepali_question', $row ? $row->nepali_question : '') }}" placeholder="e.g. मुना कृषिले कुन-कुन उत्पादनहरू उपलब्ध गराउँछ?">
            </div>

            <div class="mb-3">
                <label class="form-label">Category / Topic</label>
                <select class="form-select" name="category">
                    <option value="products" {{ old('category', $row ? $row->category : 'products') === 'products' ? 'selected' : '' }}>Products & Delivery</option>
                    <option value="farmers" {{ old('category', $row ? $row->category : '') === 'farmers' ? 'selected' : '' }}>Farmers & Payments</option>
                    <option value="institutions" {{ old('category', $row ? $row->category : '') === 'institutions' ? 'selected' : '' }}>Institutions & Outlets</option>
                </select>
                <small class="text-muted">Used for the category filter pills on the FAQ Help Center.</small>
            </div>

            <div class="mb-3">
                <label class="form-label">Answer <span class="text-danger">*</span></label>
                <textarea class="form-control" name="answer" rows="5" required placeholder="Detailed helpful answer...">{{ old('answer', $row ? $row->answer : '') }}</textarea>
            </div>
        </fieldset>
    </div>
</div>
