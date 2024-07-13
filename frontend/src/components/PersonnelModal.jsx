import React, { useState } from 'react';

function PersonnelModal({ isOpen, onClose, onSubmit }) {
  const [formData, setFormData] = useState({
    code_pers: '',
    nom_pers: '',
    prenom_pers: '',
    sexe_pers: '',
    date_naissance_pers: '',
    lieu_naissance_pers: '',
    statut_matrimonial_pers: '',
    lieu_residence_pers: '',
    premier_telephone_pers: '',
    deuxieme_telephone_pers: '',
    numero_cni_pers: '',
    email_pers: '',
    login_pers: '',
    mot_de_passe_pers: '',
    photo_pers: '',
    langue_pers: '',
    bibliographie_pers: '',
    nombre_enfants_pers: '',
  });

  const handleChange = (e) => {
    const { name, value } = e.target;
    setFormData({
      ...formData,
      [name]: value,
    });
  };

  const handleSubmit = (e) => {
    e.preventDefault();
    onSubmit(formData);
  };

  if (!isOpen) return null;

  return (
    <div className="modal modal-open">
      <div className="modal-box">
        <h2 className="font-bold text-lg">Ajouter Personnel</h2>
        <form onSubmit={handleSubmit}>
          {Object.keys(formData).map((key) => (
            <div key={key} className="form-control">
              <label className="label">
                <span className="label-text">{getFieldLabel(key)}</span>
              </label>
              <input
                type={getFieldType(key)}
                name={key}
                value={formData[key]}
                onChange={handleChange}
                className="input input-bordered"
                placeholder={`Entrer ${getFieldLabel(key)}`}
              />
            </div>
          ))}
          <div className="modal-action">
            <button type="button" className="btn" onClick={onClose}>
              Annuler
            </button>
            <button type="submit" className="btn btn-primary">
              Soumettre
            </button>
          </div>
        </form>
      </div>
    </div>
  );
}

function getFieldLabel(key) {
  switch (key) {
    case 'code_pers':
      return 'Code Personnel';
    case 'nom_pers':
      return 'Nom';
    case 'prenom_pers':
      return 'Prénom';
    case 'sexe_pers':
      return 'Sexe';
    case 'date_naissance_pers':
      return 'Date de Naissance';
    case 'lieu_naissance_pers':
      return 'Lieu de Naissance';
    case 'statut_matrimonial_pers':
      return 'Statut Matrimonial';
    case 'lieu_residence_pers':
      return 'Lieu de Résidence';
    case 'premier_telephone_pers':
      return 'Premier Téléphone';
    case 'deuxieme_telephone_pers':
      return 'Deuxième Téléphone';
    case 'numero_cni_pers':
      return 'Numéro CNI';
    case 'email_pers':
      return 'Email';
    case 'login_pers':
      return 'Login';
    case 'mot_de_passe_pers':
      return 'Mot de Passe';
    case 'photo_pers':
      return 'Photo';
    case 'langue_pers':
      return 'Langue';
    case 'bibliographie_pers':
      return 'Bibliographie';
    case 'nombre_enfants_pers':
      return 'Nombre d\'Enfants';
    default:
      return key;
  }
}

function getFieldType(key) {
  if (key.includes('date')) {
    return 'date';
  } else if (key.includes('email')) {
    return 'email';
  } else if (key.includes('telephone')) {
    return 'tel'; // ou 'text' en fonction de vos besoins de validation
  } else if (key.includes('mot_de_passe')) {
    return 'password';
  } else if (key.includes('nombre_enfants')) {
    return 'number';
  } else {
    return 'text';
  }
}

export default PersonnelModal;
