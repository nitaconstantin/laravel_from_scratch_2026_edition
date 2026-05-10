<x-layout>
    <form method="POST" action="/ideas/{{ $idea->id }}">
        @csrf
        @method('PATCH')
        <div class="col-span-full">
            <label for="description" class="block text-sm/6 font-medium text-white">Edit Your Idea</label>
            <div class="mt-2">
                <textarea id="description" name="description" rows="3"
                    class="textarea w-full @error('description') textarea-error text-error @enderror"></textarea>
                <x-forms.error name='description' />
            </div>

        </div>
        <div class="mt-6 flex items-center gap-x-2">

            <button type="submit" class="btn btn-primary">Update</button>
            <button type="submit" form="delete-idea-form" class="btn btn-neutral">Delete</button>
    </form>

    </div>

    </form>
    <form id="delete-idea-form" action="/ideas/{{ $idea->id }}" method="POST">
        @csrf
        @method('DELETE')


</x-layout>
