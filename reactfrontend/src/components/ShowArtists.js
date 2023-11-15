import React,{useEffect,useState}  from "react";
import axios from 'axios'
import {Link} from "react-router-dom";

const ShowArtists = () =>{

    const endpoint = 'http://localhost:8000/api'
    const [artists,setArtists] = useState([])
    useEffect(()  =>{getAllArtists()})
    const getAllArtists = async () => {
        const response = await axios.get(`${endpoint}/artists`)
        setArtists(response.data)
    }
    const deleteArtists = async (id) =>{
       await axios.delete(`${endpoint}/artist/${id}`)
        getAllArtists()
    }
    return(
        <div>
            <div className="d-grid gap-2">
                <Link to="/create" className='btn btn-success btn-lg mt-2 mb-2 text-white'>Create</Link>
            </div>
            <table className="table table-striped">
                <thead className={'bg-primary text-white'}>
                    <tr>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Age</th>
                        <th>Style</th>
                    </tr>
                </thead>
                <tbody>
                    {artists.map((artists)=>(
                        <tr key={artists.id}>
                            <td>{artists.name}</td>
                            <td>{artists.description}</td>
                            <td>{artists.age}</td>
                            <td>{artists.style}</td>
                            <td>
                                <Link to={`/edit/${artists.id}`} className={'btn btn-warning'}>Edit</Link>
                                <button onClick={() => deleteArtists(artists.id)} className={'btn btn-danger'}>Delete</button>
                            </td>
                        </tr>
                    ))}
                </tbody>
            </table>
        </div>
    )
}

export default ShowArtists
