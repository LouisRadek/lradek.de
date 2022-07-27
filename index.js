var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _possibleConstructorReturn(self, call) { if (!self) { throw new ReferenceError("this hasn't been initialised - super() hasn't been called"); } return call && (typeof call === "object" || typeof call === "function") ? call : self; }

function _inherits(subClass, superClass) { if (typeof superClass !== "function" && superClass !== null) { throw new TypeError("Super expression must either be null or a function, not " + typeof superClass); } subClass.prototype = Object.create(superClass && superClass.prototype, { constructor: { value: subClass, enumerable: false, writable: true, configurable: true } }); if (superClass) Object.setPrototypeOf ? Object.setPrototypeOf(subClass, superClass) : subClass.__proto__ = superClass; }

(function () {
    'use strict';

    var Calculator = function (_React$Component) {
        _inherits(Calculator, _React$Component);

        function Calculator() {
            var _ref;

            var _temp, _this, _ret;

            _classCallCheck(this, Calculator);

            for (var _len = arguments.length, args = Array(_len), _key = 0; _key < _len; _key++) {
                args[_key] = arguments[_key];
            }

            return _ret = (_temp = (_this = _possibleConstructorReturn(this, (_ref = Calculator.__proto__ || Object.getPrototypeOf(Calculator)).call.apply(_ref, [this].concat(args))), _this), _this.state = {
                buttons: ["(", ")", "DEL", "AC", "1", "2", "3", "+", "4", "5", "6", "-", "7", "8", "9", "*", "0", ".", "=", "/"],
                output: ""
            }, _this.handleClick = function (buttonLetter) {
                console.log(buttonLetter);
                _this.setState({ buttonLetter: buttonLetter });
            }, _temp), _possibleConstructorReturn(_this, _ret);
        }

        _createClass(Calculator, [{
            key: "render",
            value: function render() {
                var _this2 = this;

                return React.createElement(
                    "div",
                    { className: "calcContainer" },
                    React.createElement(
                        "div",
                        { className: "output" },
                        this.state.output
                    ),
                    this.state.buttons.map(function (button) {
                        return React.createElement(
                            "button",
                            { onClick: function onClick() {
                                    return _this2.handleClick(button);
                                }, key: button },
                            button
                        );
                    })
                );
            }
        }]);

        return Calculator;
    }(React.Component);

    var domContainer = document.getElementById("calculator");
    var root = ReactDOM.createRoot(domContainer);
    root.render(React.createElement(Calculator, null));
})();