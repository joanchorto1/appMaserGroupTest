import React, { useEffect, useState } from "react";
import axios from "axios";
import { Link } from "react-router-dom";
import './ShowArtists'
import showArtists from "./ShowArtists";

const ShowConcerts = () => {
    const endpoint = 'http://localhost:8000/api';
    const [concerts, setConcerts] = useState([]);


    const getAllConcerts = async () => {
        const response = await axios.get(`${endpoint}/concerts`);
        setConcerts(response.data);
    };

    useEffect(() => {
        getAllConcerts();
    }, []);

    const deleteConcerts = async (id) => {
        await axios.delete(`${endpoint}/concert/${id}`);
        getAllConcerts();
    };

    return (
        <div>
            <div className="d-grid gap-2">
                <Link to="/createConcert" className="btn btn-success btn-lg mt-2 mb-2 text-white">
                    Create
                </Link>
            </div>
            <table className="table table-striped">
                <thead className={'bg-primary text-white'}>
                <tr>
                    <th>Place</th>
                    <th>Date</th>
                    <th>Artists</th>
                </tr>
                </thead>
                <tbody>
                {concerts.map((concert) => (
                    <tr key={concert.id}>
                        <td>{concert.place}</td>
                        <td>{concert.date}</td>
                        <td>{concert.artist_id }</td>
                        <td>
                            <Link to={`/editConcert/${concert.id}`} className={'btn btn-warning'}>
                                Edit
                            </Link>
                            <button onClick={() => deleteConcerts(concert.id)} className={'btn btn-danger'}>
                                Delete
                            </button>
                        </td>
                    </tr>
                ))}
                </tbody>
            </table>
        </div>
    );
};

export default ShowConcerts;