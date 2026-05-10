<x-layout>
    <form method="POST" action="/ideas">

        @csrf
        <fieldset class="fieldset bg-base-200 border-base-300 rounded-box w-xs border p-4 mx-auto">
            <legend class="fieldset-legend">New Idea</legend>

            <div class="mt-2">
                <label for="description">Description</label>
                <textarea id="description" name="description" rows="3"
                    class="textarea w-full @error('description') textarea-error @enderror"></textarea>
                @if ($errors->has('description'))
                    <p class="text-xs text-red-500 mt-1">{{ $errors->first('description') }}</p>
                @endif

                <x-forms.error name="description" />
            </div>

            <button class="btn btn-neutral mt-4">Create</button>
        </fieldset>
    </form>
</x-layout>
