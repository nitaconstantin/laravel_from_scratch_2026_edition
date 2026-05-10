<x-layout>


    <div class="card bg-neutral p-6 ">
        <h2 class="font-bold">Your Idea</h2>
        <div>
            {{ $idea->description }}
        </div>
        <div class="mt-6">
            <a href="/ideas/{{ $idea->id }}/edit" type="submit" class="btn btn-soft">Edit</a>
        </div>
    </div>

</x-layout>
