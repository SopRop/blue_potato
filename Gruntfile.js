const sass = require('node-sass');

module.exports = function(grunt) {
    // Configuration de Grunt
    grunt.initConfig({

        sass: {
            dist: {
                options: {
                    implementation: sass,
                    sourceMap: true
                },
                files: [
                {
                    expand: true,
                    cwd: "Views/resources/css/",
                    src: ["*.scss"],
                    dest: "public/css/",
                    ext: ".css",
                },
                ],
            },
        },

        concat: {
            options: {
            },
            dist: {
                src: ["Views/resources/js/*"],
                dest: "public/js/built.js",
            },
        },

        uglify: {
            options: {
            },
            dist: {
                src: ["public/js/built.js"],
                dest: "public/js/built.min.js",
            },
        },

        watch: {
            concat: {
                files: ["Views/resources/js/*.js"],
                tasks: ["scripts:concat"],
            },
            min: {
                files: ["public/js/built.js"],
                tasks: ["scripts:min"],
            },
            styles: {
                files: ["Views/resources/css/*.scss"],
                tasks: ["styles:css"],
            },
        },

    });

    grunt.loadNpmTasks("grunt-sass");
    grunt.loadNpmTasks("grunt-contrib-concat");
    grunt.loadNpmTasks("grunt-contrib-uglify");
    grunt.loadNpmTasks('grunt-contrib-watch');

    // Définition des tâches Grunt
    grunt.registerTask("default", ["dev", "watch"]);
    grunt.registerTask("dev", ["styles:css", "scripts:concat", "scripts:min"]);

    grunt.registerTask("scripts:concat", ["concat:dist"]);
    grunt.registerTask("scripts:min", ["uglify:dist"]);
    grunt.registerTask("styles:css", ["sass:dist"]);
};