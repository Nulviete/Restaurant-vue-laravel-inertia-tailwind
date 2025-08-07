

<template>
  <Head title="Dashboard" />

  <AuthenticatedLayout>
    <template #header>
      <h2
        class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight"
      >
        Dashboard
      </h2>
    </template>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div
          class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg"
        >
          <div class="p-6 text-gray-900 dark:text-gray-100">
            You're logged in!
          </div>
        </div>
        <div
          class="border-solid border-2 border-black w-72 justify-center justify-items-center mx-auto mt-4"
        >
          <form
            class="flex flex-col w-64 p-5 justify-center mx-auto"
            enctype="multipart/form-data"
            @submit.prevent="submit"
          >
            <label class="text-3xl">Add a new meal</label>
            <input
              type="text"
              v-model="form.name"
              placeholder="Meal name"
              required
            />
            <select v-model="form.category" required>
              <option value="" disabled>Category</option>
              <option value="main">Main</option>
              <option value="soup">Soup</option>
              <option value="desert">Desert</option>
            </select>
            <input
              type="text"
              v-model="form.description"
              placeholder="Meal description"
              required
            />
            <input type="file" @change="previewImage" required />
            <img v-if="url" :src="url" class="w-full mt-4" />
            <div class="text-center pt-2">
              <button
                type="submit"
                value="Create the new meal"
                class="border-solid border-2 border-indigo-600 w-20"
              >
                Create
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Inertia } from "@inertiajs/inertia";
import { Head, useForm } from "@inertiajs/vue3";
import { ref } from "vue";

const url = ref("");
const photo = ref(null);

const form = useForm({
  name: "",
  category: "",
  description: "",
  image: null,
});

const submit = () => {
  form.image = photo.value;

  const data = new FormData();
  data.append("name", form.name);
  data.append("category", form.category);
  data.append("description", form.description);
  data.append("image", photo.value);

  Inertia.post("/food", data, {
    preserveScroll: true,
    onSuccess: () => {
      form.reset();
      url.value = "";
      photo.value = null;
    },
    onError: (errors) => {
      console.error(errors);
    },
  });
};

const previewImage = (e) => {
  photo.value = e.target.files[0];
  url.value = URL.createObjectURL(photo.value);
};
</script>
