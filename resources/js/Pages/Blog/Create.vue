<template>
  <Nav/>
    <div class="bg-indigo-50 min-h-screen md:px-20 pt-6">
      <div class=" bg-white rounded-md px-6 py-10 max-w-2xl mx-auto">
          <Head title="Create Blog" />
          <h1 class="mb-8 text-3xl font-bold">
             Create Blog
          </h1>
          <div class="max-w-3xl bg-white rounded-md shadow overflow-hidden">
            <form @submit.prevent="store">
              <div class="flex flex-wrap -mb-8 -mr-6 p-8">
                  <div>
                    <label for="title" class="text-lx font-serif">Title:</label>
                    <input v-model="form.title" :error="form.errors.title" id="title" name="title" placeholder="Title" class="ml-2 outline-none py-1 px-2 text-md border-2 rounded-md" />
                  </div>
                  <div class="">
                      <label for="slug" class="text-lx font-serif">Slug:</label>
                      <input v-model="form.slug" :error="form.errors.slug"  id="slug" name="slug" placeholder="Slug" class="ml-2 outline-none py-1 px-2 text-md border-2 rounded-md" />
                  </div>
                  <div>
                    <label for="description" class="block mb-2 text-lg font-serif">Body:</label>
                    <textarea  cols="90" rows="5" v-model="form.body" :error="form.errors.body" id="body" placeholder="Body " name="body" class="w-full font-serif  p-4 text-gray-600 bg-indigo-50 outline-none rounded-md"></textarea>
                  </div>
                  <div class="mt-10 mb-10">
                      <label for="image" class="text-lx font-serif">Image:</label>
                      <input   type="file" accept="image/*" id="image" name="image" placeholder="Image" class="ml-2 " />
                  </div>

                </div>
                <div class="flex items-center justify-end px-8 py-4 bg-gray-50 border-t border-gray-100">
                    <button type="submit" class=" px-6 py-2 mx-auto block rounded-md text-lg font-semibold text-indigo-100 bg-indigo-600  ">ADD BLOG</button>
                </div>
            </form>
          </div>
      </div>
    </div>
</template>

<script>
import Nav from '../../Shared/Navbar.vue';
import { Head, Link } from '@inertiajs/inertia-vue3'

export default {
  components: {
    Head,
    Link,
    Nav,
  },
  remember: 'form',
  data() {
    return {
      form: this.$inertia.form({
        title: '',
        slug: '',
        body: '',
        image: '',
      }),
    }
  },
  methods: {
    store() {
      this.form.post('/blog')
    },
  },
 
}
</script>
