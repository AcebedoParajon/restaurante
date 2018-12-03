module.exports = function(grunt) {
  // Do grunt-related things in here
	grunt.initConfig({
		uncss: {
		    dist: {
		        files: {
		            'views/app/css/csslimpio.css': [
		            'home.html', 
		            'login.html',
		            'administrar.html',
		            'editar.html',
		            'crear.html',
		            'cambiarcontra.html'
		            ]
		        }
		    }
		}
	});
  grunt.loadNpmTasks('grunt-uncss');
  grunt.registerTask('default', 'uncss');
};