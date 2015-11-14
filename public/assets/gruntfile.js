/**
 * Created by Chanx on 11/8/2015.
 */

module.exports = function (grunt) {
    grunt.initConfig({
        sass: {
            compile: {
                files: {
                    "css/app.css" : "src/bower_components/bootstrap-sass/assets/stylesheets/_bootstrap.scss"
                }
            }
        },
        copy: {
            js: {
                files: [{
                    expand: true,
                    cwd: 'src/bower_components/bootstrap-sass/assets/javascripts/',
                    src: 'bootstrap.min.js',
                    dest: 'js/'
                },
                    {
                        expand: true,
                        cwd: 'src/bower_components/jquery/dist/',
                        src: 'jquery.min.js',
                        dest: 'js/'
                    }]
            }
        }
    })

    grunt.loadNpmTasks('grunt-contrib-sass');
    grunt.loadNpmTasks('grunt-contrib-copy');

    grunt.registerTask('default', ['sass','copy']);
};