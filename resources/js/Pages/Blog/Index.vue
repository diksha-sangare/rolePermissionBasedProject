<template>
  <Nav />

    <Head title="Dashboard"></Head>

    <h2 class="text-xl font-semibold leading-tight text-gray-800">Blog</h2>
        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <div class="mb-4">
                            <Link class="px-6 py-2 mb-2 text-green-100 bg-green-500 rounded " href="/blogs/create">Blog Create</Link>
                        </div>
                        <table>
                            <thead class="font-bold bg-gray-300 border-b-2">
                                <td class="px-4 py-2">Image</td>
                                <td class="px-4 py-2">Title</td>
                                <td class="px-4 py-2">Slug</td>
                                <td class="px-4 py-2">Body</td>
                                <td class="px-4 py-2">Action</td>
                            </thead>
                            <tbody>
                                <tr v-for="blog in blogs" :key="blog.id">
                                   <td class="px-4 py-2">
                                       <img  class="block -my-2 mr-2 w-5 h-5 rounded-full" :src="blog.image" />
                                   </td>
                                   <td class="px-4 py-2">{{ blog.title }}</td>
                                   <td class="px-4 py-2">{{ blog.slug }}</td>
                                   <td class="px-4 py-2">{{ blog.body }}</td>
                                   <td class="px-4 py-2 font-extrabold">
                                        
                                    </td>
                                </tr>
                               
                                                              
                            </tbody>
                        </table>
                        <!-- <pagination :links="blog.links" /> -->
                    </div>
                </div>
            </div>
        </div>



</template>

<script>
import Nav from '../../Shared/Navbar.vue';
import { Link } from "@inertiajs/inertia-vue3";
import { Head } from "@inertiajs/inertia-vue3";
import { ref } from 'vue';
export default {
components:{Nav,Head, Link,},
props: {
        blogs: Object,
    },
}
</script>

<style>

</style>