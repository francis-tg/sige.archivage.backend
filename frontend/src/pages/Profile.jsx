import React, { useState, useEffect } from 'react';
import { GET_PERSONNEL_API, UPDATE_PERSONNEL_API } from ".."; // Assurez-vous que ces API sont correctement définies

/**
 * Composant pour afficher et modifier le profil d'un personnel.
 * 
 * @param {Object} props - Les propriétés du composant.
 * @returns {JSX.Element} Le composant JSX.
 */
const Profile = ({ match }) => {
  const [personnel, setPersonnel] = useState({
    nom: '',
    prenom: '',
    sexe: '',
    date_naissance: '',
    lieu_naissance: '',
    statut_mat: '',
    lieu_residence: '',
    first_phone: '',
    second_phone: '',
    cni: '',
    photo: '',
    lang: '',
    bibliographie: '',
    nb_enfant: null,
  });

  const [error, setError] = useState('');
  const [message, setMessage] = useState('');

  useEffect(() => {
    const fetchPersonnel = async () => {
      const { url, ...meta } = GET_PERSONNEL_API;
      try {
        const response = await fetch(`${url}/${match.params.code_pers}`, { ...meta, credentials: 'include' });
        const data = await response.json();
        setPersonnel(data);
      } catch (err) {
        setError('Erreur lors du chargement des données');
      }
    };

    fetchPersonnel();
  }, [match.params.code_pers]);

  const handleChange = (e) => {
    const { name, value } = e.target;
    setPersonnel({ ...personnel, [name]: value });
  };

  const handleUpdate = async (e) => {
    e.preventDefault();
    const { url, ...meta } = UPDATE_PERSONNEL_API;
    
    // Utilisation de FormData pour envoyer les données
    const formData = new FormData();
    for (const key in personnel) {
      if (personnel.hasOwnProperty(key)) {
        formData.append(key, personnel[key]);
      }
    }

    // Mise à jour de la méthode et des headers pour l'utilisation de FormData
    const fetchOptions = {
      ...meta,
      body: formData,
    };

    try {
      const response = await fetch(`${url}/${match.params.code_pers}`, fetchOptions);
      if (!response.ok) {
        throw new Error('Erreur lors de la mise à jour des données');
      }
      const data = await response.json();
      setMessage('Personnel mis à jour avec succès');
      setPersonnel(data);
    } catch (err) {
      setError('Erreur lors de la mise à jour des données');
    }
  };

  return (
    <div>
      <h1>Modifier le Profil du Personnel</h1>
      {error && <p style={{ color: 'red' }}>{error}</p>}
      {message && <p style={{ color: 'green' }}>{message}</p>}
      <form onSubmit={handleUpdate}>
        <div>
          <label>Nom:</label>
          <input type="text" name="nom" value={personnel.nom} onChange={handleChange} required />
        </div>
        <div>
          <label>Prénom:</label>
          <input type="text" name="prenom" value={personnel.prenom} onChange={handleChange} required />
        </div>
        <div>
          <label>Sexe:</label>
          <input type="text" name="sexe" value={personnel.sexe} onChange={handleChange} required />
        </div>
        <div>
          <label>Date de Naissance:</label>
          <input type="date" name="date_naissance" value={personnel.date_naissance} onChange={handleChange} required />
        </div>
        <div>
          <label>Lieu de Naissance:</label>
          <input type="text" name="lieu_naissance" value={personnel.lieu_naissance} onChange={handleChange} required />
        </div>
        <div>
          <label>Statut Matrimonial:</label>
          <input type="text" name="statut_mat" value={personnel.statut_mat} onChange={handleChange} required />
        </div>
        <div>
          <label>Lieu de Résidence:</label>
          <input type="text" name="lieu_residence" value={personnel.lieu_residence} onChange={handleChange} required />
        </div>
        <div>
          <label>Premier Téléphone:</label>
          <input type="text" name="first_phone" value={personnel.first_phone} onChange={handleChange} required />
        </div>
        <div>
          <label>Deuxième Téléphone:</label>
          <input type="text" name="second_phone" value={personnel.second_phone} onChange={handleChange} />
        </div>
        <div>
          <label>CNI:</label>
          <input type="text" name="cni" value={personnel.cni} onChange={handleChange} required />
        </div>
        <div>
          <label>Photo:</label>
          <input type="text" name="photo" value={personnel.photo} onChange={handleChange} />
        </div>
        <div>
          <label>Langue:</label>
          <input type="text" name="lang" value={personnel.lang} onChange={handleChange} />
        </div>
        <div>
          <label>Bibliographie:</label>
          <textarea name="bibliographie" value={personnel.bibliographie} onChange={handleChange}></textarea>
        </div>
        <div>
          <label>Nombre d'Enfants:</label>
          <input type="number" name="nb_enfant" value={personnel.nb_enfant} onChange={handleChange} />
        </div>
        <button type="submit">Mettre à jour</button>
      </form>
    </div>
  );
};

export default Profile;
