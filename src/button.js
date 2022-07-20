(function() {
    'use strict'

    class Button extends React.Component {
        constructor(props) {
            super(props);
            this.state = {
                name: 'Louis',
                appVersion: '',
            }
        } 
    
        render() { 
            return (
                <div>
                   <h1>Hello {this.state.name}!</h1>
                    <button>Download</button> 
                </div>
            );
        }
    }
    
    const domContainer = document.getElementById("button");
    const root = ReactDOM.createRoot(domContainer);
    root.render(<Button />);
})


