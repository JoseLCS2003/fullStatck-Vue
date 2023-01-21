<template>
    <Head title="Materias"/>
    <Inicio/>
    <form @submit.prevent="guardarMateria" class="container mx-auto mt-7">
  <div class="relative z-0 w-full mb-6 group">
      <input v-model="form.nombre" type="text" name="nombre" id="nombre" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" "/>
      <label for="nombre" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Nombre</label>
      
  </div>
  <div class="relative z-0 w-full mb-6 group">
      <input v-model="form.unidades" type="text" name="unidades" id="unidades" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" "/>
      <label for="unidades" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Unidades</label>
  </div>
  <button type="submit" class="text-green-700 hover:text-white border border-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-green-500 dark:text-green-500 dark:hover:text-white dark:hover:bg-green-600 dark:focus:ring-green-800" :disabled="form.processing">Guardar</button>
    </form>
</template>
<script setup>
import { Head } from '@inertiajs/vue3';
import Inicio from '@/Layouts/Inicio.vue';
import { reactive } from 'vue';
import { router } from '@inertiajs/vue3';

const form= reactive({
    nombre:null,
    unidades:null
})

function guardarMateria(){
    router.post('/materias/nueva',form)
}

</script>