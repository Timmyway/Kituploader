var vm = new Vue({
	el: '#app',			
	data() {
		return {
			kits: null
		}
	},
	methods: {
		uploadFile() {
			console.log(this.$refs.file.files)
			this.kits = this.$refs.file.files[0];
		},
		uploadKit() {			
			const formData = new FormData();
			formData.append('file-to-upload', this.images);
			const headers = { 'Content-Type': 'multipart/form-data' };
			axios.post('http://localhost:8888/api/upload.php', formData, { headers })
			.then(function (response) {
				console.log(response.data.files);
				console.log(response.status);
			})
			.catch(function (error) {
				console.log(error);
			});
		}
	}
})