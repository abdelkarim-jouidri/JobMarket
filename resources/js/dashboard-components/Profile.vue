<template>
    <div class="mb-8">
      <input type="file" ref="fileInput" @change="handleFileUpload">
      <button @click="uploadResume">Upload Resume</button>
    </div>
    <div class="p-4 bg-slate-400 cursor-pointer">
        <a @click="downloadPdf">Download Resume</a>
    </div>
  </template>
  
  <script setup>
  import { ref } from 'vue'
  import axios from 'axios'
  
  const fileInput = ref(null)
  const resumePath = ref(null)
  
  function handleFileUpload() {
    resumePath.value = fileInput.value.files[0]
  }
  
  async function uploadResume() {
    const formData = new FormData()
    formData.append('resume', resumePath.value)
    
    try {
      const response = await axios.post('/api/upload-resume', formData, {
        headers: {
          'Content-Type': 'multipart/form-data'
        }
      })
      
      console.log(response.data)
    } catch (error) {
      console.log(error)
    }
  }


function downloadPdf() {
  axios.get('/download-pdf', { responseType: 'blob' })
    .then(response => {
      const url = window.URL.createObjectURL(new Blob([response.data]));
      const link = document.createElement('a');
      link.href = url;
      link.setAttribute('download', 'file.pdf');
      document.body.appendChild(link);
      link.click();
    })
    .catch(error => {
      console.log(error);
    });
}
  </script>
  