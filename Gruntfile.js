module.exports = function(grunt) {
	grunt.initConfig({
		pkg: grunt.file.readJSON('package.json'),

		// Concats javascript files
		// concat: {
		// 	dist: {
		// 		src: [
		// 			'wp-content/themes/cos/assets/js/global/*.js',
		// 			'!wp-content/themes/cos/assets/js/global.js',
		// 			'!wp-content/themes/cos/assets/js/global.min.js'
		// 		],
		// 		dest: 'wp-content/themes/cos/assets/js/global.js',
		// 	}
		// },

		//Compile Sass
		sass: {
			options: {
				style: 'expanded',
				lineNumbers: true,
				sourcemap: 'none'
			},
			dist: {
				files: {
					'wp-content/themes/cos/assets/css/style.css': 'wp-content/themes/cos/assets/sass/style.scss'
				}
			}
		},

		// Sass linter
		sasslint: {
			options: {
				configFile: '.sass-rules.yml',
				formatter: 'unix'
			},
			target: ['wp-content/themes/cos/assets/sass/**/*.scss']
		},

		// Auto-prefixe CSS
		autoprefixer: {
			single_file: {
			  options: {
				browsers: ['> 1%']
			  },
			  src: 'wp-content/themes/cos/assets/css/style.css',
			  dest: 'wp-content/themes/cos/assets/css/style.css'
			},
		},

		// svg sprite system
		svgstore: {
		 options: {
			 prefix : 'icon-',
			 cleanup : ['fill'],
			 svg: {
				 style : 'display:none;'
			 }
		 },
		 default : {
			 files: {
				 'wp-content/themes/cos/assets/icons/svg-defs.svg': ['wp-content/themes/cos/assets/svg/*.svg'],
			 }
		 }
		},

		// get the critical path css
		// critical: {
	  //   home: {
	  //     options: {
	  //       base: './',
	  //       css: [
	  //           'wp-content/themes/cos/assets/css/style.css'
	  //       ],
	  //       width: 1400,
	  //       height: 800
	  //     },
	  //     src: 'http://kd2018.test/',
	  //     dest: 'wp-content/themes/cos/assets/css/critical/critical-home.css'
	  //   }
		// },

		// increment "build" number to bust some cache
		// buildnumber: {
		// 	options: {
		// 		field: 'build'
		// 	},
		// 	files: ['wp-content/themes/cos/assets/css/bust-cache.json']
		// },

		// Watch files for changes then executes tasks
		watch: {
			css: {
				files: ['wp-content/themes/cos/assets/sass/**/*.scss'],
				tasks: ['sass', 'sasslint', 'autoprefixer'],
				options: {
					spawn: false,
				}
			}
		},

		// Minifies css
		cssmin: {
		  minify: {
			 expand: true,
			 src: ['wp-content/themes/cos/assets/css/style.css'],
			 dest: '',
			 ext: '.min.css'
		  }
		},

		// Minifies javascript files
		uglify: {
			 build: {
				 src: 'wp-content/themes/cos/assets/js/global.js',
				 dest: 'wp-content/themes/cos/assets/js/global.min.js'
			 }
		},

		// Live reload of style sheet in browser
		browserSync: {
			 dev: {
				 bsFiles: {
					 src : 'wp-content/themes/cos/assets/css/style.css'
				 },
				 options: {
					 watchTask: true,
					 open: false,
					 ghostMode: {
						 clicks: true,
						 forms: true,
						 scroll: true
					 },
					 proxy: "changeover.test" // change this to your project's dev URL
				 }
			 }
		}

	});

	// grunt.loadNpmTasks('grunt-contrib-concat');
	grunt.loadNpmTasks('grunt-contrib-uglify');
	grunt.loadNpmTasks('grunt-contrib-sass');
	grunt.loadNpmTasks('grunt-autoprefixer');
	grunt.loadNpmTasks('grunt-contrib-cssmin');
	grunt.loadNpmTasks('grunt-browser-sync');
	grunt.loadNpmTasks('grunt-contrib-watch');
	grunt.loadNpmTasks('grunt-sass-lint');
	grunt.loadNpmTasks('grunt-svgstore');
	grunt.loadNpmTasks('grunt-critical');
	grunt.loadNpmTasks('grunt-build-number');

	grunt.registerTask('default', ['sass', 'sasslint', 'autoprefixer', 'cssmin', 'uglify', 'svgstore', 'browserSync', 'watch']);
};
