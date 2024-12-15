<div x-data="{ open: false }" class="p-3">
    <button type="button" class="btn btn-primary" x-on:click="open = true" x-show="!open">
        Mark as Completed
    </button>

    <div x-show="open" style="display: none">
        <form wire:submit='savePayment'>
            <div class="mb-3">
                <label>Upload Screenshot</label>
                <x-form.input type="file" name="proof" wire:model.live='proof' :required="true" />
                <small> <strong>NOTE:</strong> Only Images and PDF are allowed. </small>
                <small class="text-info">
                    If you encounter an error asking you to select an image even though you have already chosen one,
                    please click the 'Complete Deposit' button again.
                </small>
            </div>
            <div class="m-0 modal-footer">
                <button type="submit" class="btn btn-primary">
                    <x-spinner wire:loading wire:target="savePayment" />
                    <i class="bi bi-upload" wire:loading.remove wire:target="savePayment"></i>
                    Complete deposit
                </button>
                <button type="button" class="btn btn-dark" x-on:click="open = false">Cancel</button>
            </div>
        </form>
    </div>
</div>
