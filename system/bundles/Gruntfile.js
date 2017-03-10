module.exports = function(grunt) {
    grunt.initConfig({
        // pkg: grunt.file.readJSON('package.json'),
        concat: {
            style: {
                src: [
                    './../../../mosecdn.com/0/0/bootstrap/4.0.0-alpha.4/css/bootstrap.min.css',
                    './../../../mosecdn.com/0/0/bootstrap/bootstrap-datetimepicker/4.17.42/css/bootstrap-datetimepicker.min.css',
                    './../../../mosecdn.com/0/0/select2/4.0.3/css/select2.css',
                    './../../../mosecdn.com/0/0/sweetalert/1.1.3/sweetalert.min.css',
                    './../../../mosecdn.com/0/0/material-icons/fonts.css',
                    './../../../mosecdn.com/0/2/mose-v1/css/reset.css',
                    './../../../mosecdn.com/0/2/mose-v1/css/form.css',
                    './../../../mosecdn.com/0/2/mose-v1/css/table.css',
                    './../../../mosecdn.com/0/2/mose-v1/css/dropdown.css',
                    './../../../mosecdn.com/0/2/mose-v1/css/modal.css',
                    './../../../mosecdn.com/0/2/mose-v1/css/waves.css',
                    './../../../mosecdn.com/0/2/mose-v1/css/jscrollpane.css',
                    './../../../mosecdn.com/0/2/mose-v1/css/bootstrap-tagsinput.css',
                    './../../../mosecdn.com/0/2/mose-v1/css/bootstrap-datetimepicker.css',
                    './../../../mosecdn.com/0/2/mose-v1/css/select2.css',
                    './../../../mosecdn.com/0/2/mose-v1/css/sweet-alert.css',
                    './../../../mosecdn.com/0/2/mose-v1/css/nprogress.css',
                    './../../../mosecdn.com/0/2/mose-v1/style.css',
                    './../../../mosecdn.com/0/2/mose-v1/responsive.css',
                    './../../../mosecdn.com/0/0/font-awesome/4.6.3/css/font-awesome.min.css',
                    './../../../mosecdn.com/0/0/jquery/jquery-ui/jquery-ui.min.css',
                ],
                dest: 'css/styles.css'
            },
            main: {
                src: [
                    './../../../mosecdn.com/0/0/jquery/jquery-2.2.4.min.js',
                    './../../../mosecdn.com/0/0/pjax/jquery.pjax.js',
                    './../../../mosecdn.com/0/0/postscribe/postscribe.min.js',
                    './../../../mosecdn.com/0/0/nprogress/nprogress.js',
                ],
                dest: 'js/main.js'
            },
            common: {
                src: [
                    './../../../mosecdn.com/0/0/jquery/jquery-ui/jquery-ui.min.js',
                    './../../../mosecdn.com/0/0//bootstrap/4.0.0-alpha.4/js/tether.min.js',
                    './../../../mosecdn.com/0/0/bootstrap/4.0.0-alpha.4/js/bootstrap.min.js',
                    './../../../mosecdn.com/0/0/bootstrap/bootstrap-select/1.11.2/js/bootstrap-select.js',
                    './../../../mosecdn.com/0/0/momentjs/moment.min.js',
                    './../../../mosecdn.com/0/0/bootstrap/bootstrap-datetimepicker/4.17.42/js/bootstrap-datetimepicker.min.js',
                    './../../../mosecdn.com/0/0/bootstrap/bootstrap-tagsinput/bootstrap-tagsinput.js',
                    './../../../mosecdn.com/0/0/parsley/2.4.4/parsley.config.min.js',
                    './../../../mosecdn.com/0/0/parsley/2.4.4/parsley.min.js',
                    './../../../mosecdn.com/0/0/select2/4.0.3/js/select2.js',
                    './../../../mosecdn.com/0/0/nestedSortable/jquery.mjs.nestedSortable.js',
                    './../../../mosecdn.com/0/0/jquery/jquery-extend.min.js',
                    './../../../mosecdn.com/0/0/jquery/jquery-cookie/jquery.cookie.js',
                    './../../../mosecdn.com/0/0/library/jquery.mousewheel.min.js',
                    './../../../mosecdn.com/0/0/library/jquery.mwheelintent.js',
                    './../../../mosecdn.com/0/0/jscrollpane/jquery.jscrollpane.min.js',
                    './../../../mosecdn.com/0/0/historyjs/jquery.history.js',
                    './../../../mosecdn.com/0/0/plupload/plupload.full.min.js',
                    './../../../mosecdn.com/0/0/plupload/plupload.min.js',
                    './../../../mosecdn.com/0/0/clipboardjs/clipboard.min.js',
                    './../../../mosecdn.com/0/0/raphael/2.2.0/raphael.min.js',
                    './../../../mosecdn.com/0/0/chart/morrisjs/morris.min.js',
                    './../../../mosecdn.com/0/0/waypoints/jquery.waypoints.min.js',
                    './../../../mosecdn.com/0/0/numeral/numeral.min.js',
                    './../../../mosecdn.com/0/0/counterup/jquery.counterup.min.js',
                    './../../../mosecdn.com/0/0/waves/0.7.5/waves.min.js',
                    './../../../mosecdn.com/0/0/sweetalert/1.1.3/sweetalert.min.js',
                    './../../../mosecdn.com/0/0/autosize/autosize.min.js',
                    // './../../../mosecdn.com/0/0/pace/1.0.0/pace.min.js',
                    // './../../../mosecdn.com/0/0/chart/canvasjs.min.js',
                ],
                dest: 'js/common.js'
            },
            app: {
                src: [
                    './../../../mosecdn.com/0/0/mithril/0.2.5/mithril.min.js',
                    './../../../mosecdn.com/0/0/application/general/module.js',
                    './../../../mosecdn.com/0/0/application/general/ajax.js',
                    './../../../mosecdn.com/0/0/application/general/table.js',
                    './../../../mosecdn.com/0/0/application/bind.js',
                    './../../../mosecdn.com/0/0/application/common.js',
                    './../../../mosecdn.com/0/0/application/app.js',
                    './../../../mosecdn.com/0/0/application/interface.js',
                    './../../../mosecdn.com/0/0/application/general.js',
                    './../../../mosecdn.com/0/0/application/general/form.js',
                    './../../../mosecdn.com/0/0/application/general/seo.js',
                    './../../../mosecdn.com/0/0/application/general/modal.js',
                    './../../../mosecdn.com/0/0/application/plugins.js',
                    './../../../mosecdn.com/0/0/application/attachment.js',
                    './../../../mosecdn.com/0/0/application/account.js',
                    './../../../mosecdn.com/0/0/application/taxonomy.js',
                    './../../../mosecdn.com/0/0/application/store/order.js',
                    './../../../mosecdn.com/0/0/application/store/product.js',
                    './../../../mosecdn.com/0/0/application/store/variant.js',
                    './../../../mosecdn.com/0/0/application/store/discount.js',
                    './../../../mosecdn.com/0/0/application/website.js',
                    './../../../mosecdn.com/0/0/application/setting/shipping.js',
                    './../../../mosecdn.com/0/0/application/setting/domain.js',
                    './../../../mosecdn.com/0/0/application/website/post.js',
                ],
                dest: 'js/app.js'
            }
        },
        cssmin: {
            style: {
                src: 'css/styles.css',
                dest: 'css/styles.min.css'
            },
        },
        uglify: {
            main: {
               src: 'js/main.js',
               dest: 'js/main.min.js',
            },
            common: {
               src: 'js/common.js',
               dest: 'js/common.min.js',
            },
            app: {
               src: 'js/app.js',
               dest: 'js/app.min.js',
            },
        },
        watch: {
            css: {
                files: ['./../../../mosecdn.com/0/2/mose-v1/*.css','./../../../mosecdn.com/0/2/mose-v1/css/*.css'],
                tasks: ['concat:style']
            },
            js: {
                files: ['./../../../mosecdn.com/0/0/application/*.js','./../../../mosecdn.com/0/0/application/store/*.js','./../../../mosecdn.com/0/0/application/modules/*.js','./../../../mosecdn.com/0/0/application/website/*.js','./../../../mosecdn.com/0/0/application/setting/*.js','./../../../mosecdn.com/0/0/application/general/*.js'],
                tasks: ['concat:app'],
                //tasks: ['uglify:main','uglify:common','uglify:app'],
            }
        }
    });
    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-contrib-concat');
    grunt.loadNpmTasks('grunt-contrib-cssmin');
    grunt.loadNpmTasks('grunt-contrib-uglify');

    // grunt.registerTask('default', ['concat', 'cssmin', 'uglify']);
    grunt.registerTask('default', ['concat']);
    //grunt.registerTask('default', ['concat', 'cssmin', 'uglify']);
};