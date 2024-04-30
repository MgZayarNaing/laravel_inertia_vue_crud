<script setup>
import { watch, ref } from "vue";
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { useForm, Link, Head, router } from '@inertiajs/vue3'
import Pagination from "@/Components/Pagination.vue";


const props = defineProps({
    blogs: {
        type: Object,
        default: () => ({}),
    },
    filters: {
        type: Object,
        default: () => ({}),
    },
});
const form = useForm({});

function destroy(id) {
    if (confirm("Are you sure you want to Delete")) {
        form.delete(route('blogs.destroy', id));
    }
}

// pass filters in search
let search = ref(props.filters.search);
watch(search, (value) => {
    router.get(
        "/blogs",
        { search: value },
        {
            preserveState: true,
            replace: true,
        }
    );
});
</script>

<template>
    <Head title="Blogs" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Blogs
            </h2>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <!-- <div v-if="$page.props.flash.message"
                    class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800"
                    role="alert">
                    <span class="font-medium">
                        {{ $page.props.flash.message }}
                    </span>
                </div> -->
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <div class="mb-2">
                            <Link :href="route('blogs.create')" class="px-4 py-2 text-white rounded-lg bg-blue-600">
                            <button>Add Blog</button>
                            </Link>

                            <input type="text" v-model="search" placeholder="Search..."
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-60 p-2.5" />
                        </div>
                        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                <thead
                                    class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                    <tr>
                                        <th scope="col" class="px-6 py-3">#</th>
                                        <th scope="col" class="px-6 py-3">
                                            Title
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Content
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Edit
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Delete
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="blog in blogs.data" :key="blog.id"
                                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                        <th scope="row"
                                            class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                            {{ blog.id }}
                                        </th>
                                        <th scope="row"
                                            class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                            {{ blog.title }}
                                        </th>
                                        <td class="px-6 py-4">
                                            {{ blog.content }}
                                        </td>


                                        <td class="px-6 py-4">
                                            <Link :href="route(
                                                'blogs.edit',
                                                blog.id
                                            )
                                                " class="px-4 py-2 text-white bg-blue-600 rounded-lg">Edit</Link>
                                        </td>
                                        <td class="px-6 py-4">
                                            <button class="px-4 py-2 text-white rounded-lg bg-red-700"
                                                @click="destroy(blog.id)">
                                                Delete
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <Pagination :data="blogs" />

                    </div>
                </div>
            </div>
        </div>


    </AuthenticatedLayout>
</template>
