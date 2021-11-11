const { task, src, dest, watch, series, parallel } = require("gulp");
const terser = require("gulp-terser");
const concat = require("gulp-concat");
const rev = require("gulp-rev");
const revDel = require("rev-del");
const cleancss = require("gulp-clean-css");

task("watch", function () {
	watch("assets/scss/**/*", series("sass", "styles"));
	watch("assets/js/*", series("scripts"));
	watch("assets/favicon/*", series("favicon"));
	watch("assets/fonts/*", series("fonts"));
	watch("assets/img/*", series("images"));
});

task("sass", function () {
	const sass = require("gulp-sass")(require("sass"));
	const autoprefixer = require("autoprefixer");
	const postcss = require("gulp-postcss");

	return src("assets/scss/main.scss")
		.pipe(sass().on("error", sass.logError))
		.pipe(postcss([autoprefixer({ cascade: false, remove: false })]))
		.pipe(dest("assets/css"));
});

task("vendor", function () {
	return src(["node_modules/js-cookie/dist/js.cookie.js"])
		.pipe(concat("vendor.js"))
		.pipe(dest("assets/js"));
});

task("styles", function () {
	return src("assets/css/main.css")
		.pipe(cleancss())
		.pipe(rev())
		.pipe(dest("build/css"))
		.pipe(rev.manifest())
		.pipe(revDel({ force: true, dest: "build/css" }))
		.pipe(dest("build/css"));
});

task("scripts", function () {
	return src("assets/js/*.js")
		.pipe(terser())
		.pipe(rev())
		.pipe(dest("build/js"))
		.pipe(rev.manifest())
		.pipe(revDel({ force: true, dest: "build/js" }))
		.pipe(dest("build/js"));
});

task("favicon", function () {
	return src("assets/favicon/*").pipe(dest("build/favicon"));
});

task("fonts", function () {
	return src("assets/fonts/*").pipe(dest("build/fonts"));
});

task("images", function () {
	return src("assets/img/*").pipe(dest("build/img"));
});

task("clean", function () {
	const clean = require("gulp-clean");
	return src("build", { read: false, allowEmpty: true }).pipe(clean());
});

task("default", series("sass", "watch"));
task(
	"build",
	series("clean", "sass", "vendor", "styles", "scripts", "favicon", "fonts", "images")
);
