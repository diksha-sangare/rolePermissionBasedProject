<template>
  <Nav />
    <div>
        <h1>hjghjgjg</h1>
        <p class="text-sm ml-4">
            Welcome Back, {{ username }}!
        </p>

    
    </div>
 
</template>

<script>
import {Link} from '@inertiajs/inertia-vue3';
import Nav from '../../Shared/Navbar';
import { ref } from 'vue';
export default {
components:{ Link, Nav },
computed: {
    username() {
      return this.$page.props.auth.user.username;
    }
  },

};

</script>