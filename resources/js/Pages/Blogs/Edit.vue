<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { useForm, Link, Head } from '@inertiajs/vue3'

const props = defineProps({
    blog: {
        type: Object,
        default: () => ({}),
    },
});

const form = useForm({
    id: props.blog.id,
    title: props.blog.title,
    content: props.blog.content,
});

const submit = () => {
    form.put(route("blogs.update", props.blog.id));
};
</script>

<template>
    <Head title="Blog Edit" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Blog Edit
            </h2>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <div class="mb-4">
                            <Link :href="route('blogs.index')" class="px-4 py-2 text-white rounded-lg bg-blue-600">
                            <button>Blog List</button>
                            </Link>
                        </div>
                        <form @submit.prevent="submit">
                            <div class="mb-6">
                                <label for="Title"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Title</label>
                                <input type="text" v-model="form.title" name="title"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                    placeholder="" />
                                <div v-if="form.errors.title" class="text-sm text-red-600">
                                    {{ form.errors.title }}
                                </div>
                            </div>
                            
                            <div class="mb-6">
                                <label for="slug"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Content</label>
                                <textarea type="text" v-model="form.content" name="content" id=""
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"></textarea>

                                <div v-if="form.errors.content" class="text-sm text-red-600">
                                    {{ form.errors.content }}
                                </div>
                            </div>
                            <button type="submit"
                                class="text-white bg-blue-600  focus:outline-none  font-medium rounded-lg text-sm px-4 py-2"
                                :disabled="form.processing" :class="{ 'opacity-25': form.processing }">
                                Submit
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
