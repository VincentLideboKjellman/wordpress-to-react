import React, { Component }  from 'react';
import './App.css';

class App extends Component {

  constructor(props){
    super();

    this.state = {
      chefData: []
    }
  }

  componentDidMount() {
    fetch('http://localhost:8888/wp-json/wp/v2/chefs')
      .then(response => response.json())
      .then(response => this.setState({chefData: response}))
  }

  render(){
    return (
      <div className="App">
        <header className="App-header">
          {this.state.chefData.length > 0 && this.state.chefData.map(chef => {
            return (
              <div>
                <h1>{chef.acf.name}</h1>
                <img src={chef.acf.image} />
              </div>
            )
          })}
        </header>
      </div>
    );
  }
}

export default App;
