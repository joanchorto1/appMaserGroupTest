
import './App.css';
import {BrowserRouter, Routes, Route} from "react-router-dom";
import ShowArtists from "./components/ShowArtists";
import * as PropTypes from "prop-types";
import ShowConcerts from "./components/ShowConcerts";
function BrowseRouter(props) {
    return null;
}

BrowseRouter.propTypes = {children: PropTypes.node};
function App() {
  return (
    <div className="App">
      <BrowserRouter>
        <Routes>
          <Route path='/' element={<ShowArtists/>}/>
          <Route path='/concerts' element={<ShowConcerts/>}/>
          {/*<Route path='/editartist' element={<EditArtists/>}/>*/}
          {/*<Route path='/createartist' element={<CreateArtists/>}/>*/}
        </Routes>
      </BrowserRouter>
    </div>
  );
}

export default App;
