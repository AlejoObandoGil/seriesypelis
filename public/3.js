(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[3],{

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/views/Archive.vue?vue&type=script&lang=js&":
/*!*************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/views/Archive.vue?vue&type=script&lang=js& ***!
  \*************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
// import CategoriesVue from './Categories.vue'
/* harmony default export */ __webpack_exports__["default"] = ({
  data: function data() {
    return {
      authors: [],
      categories: [],
      posts: [],
      archive: []
    };
  },
  mounted: function mounted() {
    var _this = this;

    axios.get('/api/archivo').then(function (res) {
      _this.authors = res.data.authors;
      _this.categories = res.data.categories;
      _this.posts = res.data.posts;
      _this.archive = res.data.archive;
    });
  }
});

/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/views/Archive.vue?vue&type=template&id=59f043f3&":
/*!*****************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/views/Archive.vue?vue&type=template&id=59f043f3& ***!
  \*****************************************************************************************************************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "render", function() { return render; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return staticRenderFns; });
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c("section", { staticClass: "pages container" }, [
    _c("div", { staticClass: "page page-archive" }, [
      _c("h1", { staticClass: "text-capitalize" }, [
        _vm._v("Archivo de Categorias")
      ]),
      _vm._v(" "),
      _c("p", [
        _vm._v(
          "Nam efficitur, massa quis fringilla volutpat, ipsum massa consequat nisi, sed eleifend orci sem sodales lorem. Curabitur molestie eros urna, eleifend molestie risus placerat sed."
        )
      ]),
      _vm._v(" "),
      _c("div", {
        staticClass: "divider-2",
        staticStyle: { margin: "35px 0" }
      }),
      _vm._v(" "),
      _c("div", { staticClass: "container-flex space-between" }, [
        _c("div", { staticClass: "authors-categories" }, [
          _c("h3", { staticClass: "text-capitalize" }, [_vm._v("autores")]),
          _vm._v(" "),
          _c(
            "ul",
            { staticClass: "list-unstyled" },
            _vm._l(_vm.authors, function(author, index) {
              return _c("li", {
                key: index,
                domProps: { textContent: _vm._s(author.name) }
              })
            }),
            0
          ),
          _vm._v(" "),
          _c("h3", { staticClass: "text-capitalize" }, [
            _vm._v("categorias o géneros")
          ]),
          _vm._v(" "),
          _c(
            "ul",
            { staticClass: "list-unstyled" },
            _vm._l(_vm.categories, function(category, index) {
              return _c(
                "li",
                { key: index, staticClass: "text-capitalize" },
                [
                  _c(
                    "router-link",
                    {
                      attrs: {
                        to: {
                          name: "posts_category",
                          params: { category: category.url }
                        }
                      }
                    },
                    [
                      _vm._v(
                        "\n                            " +
                          _vm._s(category.name) +
                          "\n                        "
                      )
                    ]
                  )
                ],
                1
              )
            }),
            0
          )
        ]),
        _vm._v(" "),
        _c(
          "div",
          { staticClass: "latest-posts" },
          [
            _c("h3", { staticClass: "text-capitalize" }, [
              _vm._v("Peliculas y Series recientes")
            ]),
            _vm._v(" "),
            _vm._l(_vm.posts, function(post, index) {
              return _c(
                "p",
                { key: index, staticClass: "text-capitalize" },
                [
                  _c(
                    "router-link",
                    {
                      staticClass: "text-uppercase c-green",
                      attrs: {
                        to: { name: "posts_show", params: { url: post.url } }
                      }
                    },
                    [
                      _vm._v(
                        "\n                            " +
                          _vm._s(post.title) +
                          "\n                        "
                      )
                    ]
                  )
                ],
                1
              )
            }),
            _vm._v(" "),
            _c("h3", { staticClass: "text-capitalize" }, [
              _vm._v("Películas y series por año")
            ]),
            _vm._v(" "),
            _c(
              "ul",
              { staticClass: "list-unstyled" },
              _vm._l(_vm.archive, function(date, index) {
                return _c("li", { key: index }, [
                  _vm._v(
                    "\n                        " +
                      _vm._s(date.year) +
                      " (" +
                      _vm._s(date.posts) +
                      ")\n                    "
                  )
                ])
              }),
              0
            )
          ],
          2
        )
      ])
    ])
  ])
}
var staticRenderFns = []
render._withStripped = true



/***/ }),

/***/ "./resources/js/views/Archive.vue":
/*!****************************************!*\
  !*** ./resources/js/views/Archive.vue ***!
  \****************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _Archive_vue_vue_type_template_id_59f043f3___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./Archive.vue?vue&type=template&id=59f043f3& */ "./resources/js/views/Archive.vue?vue&type=template&id=59f043f3&");
/* harmony import */ var _Archive_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./Archive.vue?vue&type=script&lang=js& */ "./resources/js/views/Archive.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _Archive_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _Archive_vue_vue_type_template_id_59f043f3___WEBPACK_IMPORTED_MODULE_0__["render"],
  _Archive_vue_vue_type_template_id_59f043f3___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/views/Archive.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/views/Archive.vue?vue&type=script&lang=js&":
/*!*****************************************************************!*\
  !*** ./resources/js/views/Archive.vue?vue&type=script&lang=js& ***!
  \*****************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Archive_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/babel-loader/lib??ref--4-0!../../../node_modules/vue-loader/lib??vue-loader-options!./Archive.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/views/Archive.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Archive_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/views/Archive.vue?vue&type=template&id=59f043f3&":
/*!***********************************************************************!*\
  !*** ./resources/js/views/Archive.vue?vue&type=template&id=59f043f3& ***!
  \***********************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Archive_vue_vue_type_template_id_59f043f3___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../node_modules/vue-loader/lib??vue-loader-options!./Archive.vue?vue&type=template&id=59f043f3& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/views/Archive.vue?vue&type=template&id=59f043f3&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Archive_vue_vue_type_template_id_59f043f3___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Archive_vue_vue_type_template_id_59f043f3___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ })

}]);