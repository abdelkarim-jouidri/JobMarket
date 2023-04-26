<template>
    
    <div class="flex items-center justify-center w-full">
        <label for="dropzone-file" class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                <svg aria-hidden="true" class="w-10 h-10 mb-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path></svg>
                <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span> a file</p>
                <p class="text-xs text-gray-500 dark:text-gray-400">PDF</p>
            </div>
            <input id="dropzone-file" type="file" @change="handleFileUpload" class="hidden" />
        </label>
    </div> 

    <button 
        @click="downloadResume"
        class="bg-gray-800 text-white font-mono font-semibold rounded-lg">
        click to upload PDF
    </button>

  </template>
  
  <script setup>
  import { ref } from 'vue';
  import axios from 'axios';
  
  const selectedFile = ref(null);
  
  const handleFileUpload = async (event) => {
    // Get the selected file from the event object
    const file = event.target.files[0];
  
    // Set the selected file to the ref
    selectedFile.value = file;
  
    // Call the uploadResume method to upload the file
    await uploadResume();
  };
  
  const uploadResume = async () => {
    if (!selectedFile.value) {
      return;
    }
  
    const formData = new FormData();
    formData.append('resume', selectedFile.value);
  
    // Make an API request to upload the file
    try {
      const response = await axios.post('/api/upload-resume', formData, {
        headers: {
          'Content-Type': 'multipart/form-data'
        }
      });
  
      // Handle the response
      console.log(response.data);
    } catch (error) {
      // Handle any errors that may occur
      console.error(error);
    }
  };


  const userId = 1 // Replace with the user ID you want to download the resume for

const downloadResume = async () => {
  try {
    // Call the downloadResume endpoint and get the response
    const response = await axios.get(`/download-resume/${userId}`, {
      responseType: 'blob' // Specify the response type as 'blob' to get the file
    })

    // Create a URL for the file blob
    const url = window.URL.createObjectURL(new Blob([response.data]))

    // Create a link and click it to trigger the download
    const link = document.createElement('a')
    link.href = url
    link.setAttribute('download', 'resume.pdf')
    document.body.appendChild(link)
    link.click()
  } catch (error) {
    console.error(error)
  }
}
  </script>