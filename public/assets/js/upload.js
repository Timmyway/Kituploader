var vm = new Vue({
	el: '#app',			
	data() {
		return {
			FILE: null,
			name: 'Tim',
			result: ''
		}
	},
	methods: {
		onFileUpload (event) {
			this.FILE = event.target.files[0]
		},
		uploadKit() {
			this.result = '';
			console.log('Upload KIT now...')
			this.file = this.$refs.file.files[0];
			const formData = new FormData();
			formData.append('file-to-upload', this.FILE, this.FILE.name);
			formData.append('submit', true);
			const headers = { 'Content-Type': 'multipart/form-data' };
			axios.post('http://localhost/learnphp/public/app/generateKit', formData, { headers })
			.then((response) => {
				console.log(response.data.files);
				console.log(response.status);
				setTimeout(() => {
					this.result = response.data.response;
				}, 100)
			})
			.catch((error) => {
				console.log(error);
			});
		}
	}
})