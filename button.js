(function () {
    'use strict';

    class Button extends React.Component {
        constructor(props) {
            super(props);
            this.state = {
                name: 'Louis',
                appVersion: ''
            };
        }

        render() {
            return React.createElement(
                'div',
                null,
                React.createElement(
                    'h1',
                    null,
                    'Hello ',
                    this.state.name,
                    '!'
                ),
                React.createElement(
                    'button',
                    null,
                    'Download'
                )
            );
        }
    }

    const domContainer = document.getElementById("button");
    const root = ReactDOM.createRoot(domContainer);
    root.render(React.createElement(Button, null));
})();
