<template>
<header class="text-white bg-gray-800 body-font">
  <div class="container mx-auto flex flex-wrap p-5 flex-col md:flex-row items-center">
    <a class="flex title-font font-medium items-center text-white mb-4 md:mb-0">
      <span class="ml-3 text-xl">Materias-Profesor</span>
    </a>
    <nav class="md:ml-auto md:mr-auto flex flex-wrap items-center text-base justify-center">
      <a href="/materia" class="bg-gray-900 text-white px-3 py-2 rounded-md text-sm font-medium">Materias</a>
      <a href="/profesor" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Profesores</a>
    </nav>
  </div>
</header>
    <div class="container mx-auto">
        <slot />
    </div>
</template>