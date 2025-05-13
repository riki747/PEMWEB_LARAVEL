<x-layouts.app :title="('Create New Post')">

    <form action="{{ route('posts.store') }}" method="POST">

        @csrf

        <flux:input
            label="Title"
            name="title"
            type="text"
            class="mb-3"
            placeholder="Enter post title"
            required />

        <flux:textarea
            label="Content"
            name="content"
            type="textarea"
            class="mb-3"
            placeholder="Enter post content"
            required />

        <flux:input
            label = "Image"
            name = "image"
            class="mb-3"
            type = "file"
            accept = "image/*"

            required />

        <flux:button type="submit" variant="primary">Save</flux:button>

    </form>

</x-layouts.app>