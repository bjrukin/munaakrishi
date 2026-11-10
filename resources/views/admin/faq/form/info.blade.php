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
                <label class="form-label">Answer <span class="text-danger">*</span></label>
                <textarea class="form-control" name="answer" rows="5" required placeholder="Detailed helpful answer...">{{ old('answer', $row ? $row->answer : '') }}</textarea>
            </div>
        </fieldset>
    </div>
</div>
