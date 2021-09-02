Vue.config.devtools = true
'use strict';
new Vue({
    el: '#subtitle',
    data() {
        return {
            showResult: false,
            backgroundResult: '',
            fontsizeResult: '',
            subtitleResult: '',
            previewResult: [],
            selectedFontSize: '14',
        }
    },
    computed: {
        selectedBackground() {
            return this.backgroundResult;
        }
    }, 
    methods: {
        galleryOpenMedia(idx) {
            console.log('clicked')
            const self = this;
			var file_frame;
			file_frame = wp.media.frames.file_frame = wp.media({
				title: 'Pilih gambar untuk di upload',
				button: {
					text: 'Gunakan gambar ini',
				},
				multiple: false // Set to true to allow multiple files to be selected
			});
            
			file_frame.on( 'select', function() {
				var attachment = file_frame.state().get('selection').first().toJSON();
				document.getElementsByClassName('gallery-img-picked')[0].style.display = 'block'
				document.getElementsByClassName('gallery-img-picked')[0].src = attachment.url
				document.getElementsByClassName('inputUrl')[0].value = attachment.url
                self.backgroundResult = attachment.url;
			});
            
			file_frame.open();
		},
        generateShortcode() {
            const self = this;
            
            const title = document.getElementsByClassName('inputId')[0].value,
                fontsize = document.getElementById('fontsize').value;

                self.subtitleResult = title;
                self.fontsizeResult = fontsize;

            if (title === '') {
                alert('Silahkan isi kolom kosong')
                return;
            } else {
                self.showResult = true;
                const shortcode = `[SubTitle title="${self.subtitleResult}" background="${self.backgroundResult}" fontsize="${self.fontsizeResult}" /]`;

			    self.$refs.inputResult.value = shortcode;
                self.previewResult = ``
                // return `[Subtitle title="${self.subtitleResult}" background="${self.backgroundResult}" fontsize="${self.fontsizeResult}" /]`
            }

        }
    }
})

