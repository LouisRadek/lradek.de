(function() {
    'use strict'

    class Calculator extends React.Component {
        state = {  
            buttons: ["(", ")", "DEL", "AC", "1", "2", "3", "+", "4", "5", "6", "-", "7", "8", "9", "*", "0", ".", "=", "/"],
            output: "",
        };

        handleClick = (buttonLetter) => {
            console.log(buttonLetter);
            this.setState({buttonLetter})
        };

        render() { 
            return (
              <div className="calcContainer">
                <div className="output">{this.state.output}</div>
                {this.state.buttons.map((button) => (
                    <button onClick={() => this.handleClick(button)} key={button}>{button}</button>
                ))}
              </div>
            );
        }
    }

    const domContainer = document.getElementById("calculator");
    const root = ReactDOM.createRoot(domContainer);
    root.render(<Calculator />);
})();