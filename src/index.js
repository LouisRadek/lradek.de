(function() {
    'use strict'

    class Calculator extends React.Component {
        state = {  
            buttons: ["(", ")", "DEL", "AC", "1", "2", "3", "+", "4", "5", "6", "-", "7", "8", "9", "*", "0", ".", "=", "/", "^"],
            output: "",
        };

        handleClick = (inputSymbal) => {
            let pattern = /[0-9()\.=]/;
            let syntaxError = new Error("Syntax Error")
            let emptyInput = new Error("Empty inputfield")

            if (inputSymbal == "DEL") {
                this.setState({output: this.state.output.slice(0, -1)});
                return;
            }

            if (inputSymbal == "AC") {
                this.setState({output: ""});
                return;
            }

            if (inputSymbal.match(pattern) === null) {
                this.setState({output: `${this.state.output} ${inputSymbal} `});
                return;
            }

            if (inputSymbal == "=") {
                try {
                    let term = eval(this.state.output);
                    term = Math.round(Number(term) * 1000000) / 1000000;
                    if (term == NaN) {
                        console.log("triggered");
                        this.setState({output: "Empty inputfield"});
                        return;
                    }
                    this.setState({output: term});
                } catch (e) {
                    this.setState({output: "Syntax Error"})
                }
                return;
            }
            this.setState({output: `${this.state.output}${inputSymbal}`});
        };

        render() { 
            return (
              <div className="calcContainer">
                <div className="output-container">
                   <div className="output">{this.state.output}</div> 
                </div>
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