//Include Gulp
var gulp = require('gulp');

//Include plugins
var uncss = require('gulp-uncss');
var rename = require('gulp-rename');

//Uncss task
gulp.task('uncss', function() {

gulp.src('views/app/vendor/bootstrap/css/bootstrap.min.css')       
.pipe(uncss({
	html: [
	'home.html'
	// 'login.html',
	// 'administrar.html',
	// 'editar.html',
	// 'crear.html',
	// 'cambiarcontra.html'
	 ] 
	}))        
.pipe(rename({suffix: '.clean'
	}))

.pipe(gulp.dest('views/app/vendor/bootstrap/css/'));

});