<?php include(ROOT.'/Views/header.php'); ?>

<div class="container upload-box">
    <form method="post" enctype="multipart/form-data">
        <h6>Select KIT to upload (Only .zip files allowed):</h6>
        <div class="form-group mb-3">
            <input 
                class="form-control" 
                type="file" 
                name="file-to-upload" id="file-to-upload" ref="file"
                @change="onFileUpload"
            >
        </div>
        <input 
            type="submit" 
            value="Upload KIT" 
            name="submit" 
            class="btn btn-info text-white mb-4"
            @click.prevent="uploadKit"
        >    
    </form>
    <div class="result-area">
        <textarea name="" id="" cols="10" rows="50" class="form-control" v-model="result"></textarea>
    </div>
</div>

<?php include(ROOT.'/Views/footer.php'); ?>