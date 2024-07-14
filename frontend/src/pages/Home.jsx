import React, { useCallback, useEffect, useRef, useState } from 'react';
import { useDropzone } from 'react-dropzone';
import { Link, useNavigate } from 'react-router-dom';
import { LuBookOpen, LuFileEdit, LuFolder, LuPlus, LuShare2, LuTrash2, LuUploadCloud } from 'react-icons/lu';
import { IoClose } from 'react-icons/io5';
import { toast } from 'react-toastify';
import Cards from '../components/fragments/Cards';
import { createCategorie, getCategorie } from '../api/routes/categorie';
import { createDocument } from '../api/routes/document';
import { ContextMenu, ContextMenuTrigger, ContextMenuContent,ContextMenuItem, ContextMenuShortcut } from '../ui/ui/context-menu';
function Home() {
  const [selectedFiles, setSelectedFiles] = useState([]);
  const [dossiers, setDossiers] = useState([]);
  const [folderData, setFolderData] = useState({ label: '' });
  const [docData, setDocData] = useState({
    titre: "",
    resume: "",
    auteur: "",
    file_create_date: "",
    reference: "",
    category_id: null
  });

  const uploadFileRef = useRef(null);

  const onDrop = useCallback(acceptedFiles => {
    setSelectedFiles(acceptedFiles);
    const file = acceptedFiles[0];
    setDocData(prevData => ({
      ...prevData,
      file_create_date: file?.lastModified,
      titre: file?.name.split(".")[0]
    }));
  }, []);

  const fetchFolders = async () => {
    try {
      const res = await getCategorie();
      if (res.status === 200) {
        const data = await res.json();
        setDossiers(data);
      }
    } catch (error) {
      console.log(error);
    }
  };

  const getFormData = (e, callback) => {
    callback(prevData => ({
      ...prevData,
      [e.target.name]: e.target.value
    }));
  };

  const createFolder = async (e) => {
    e.preventDefault();
    try {
      const res = await createCategorie(folderData);
      if (res.status === 201) {
        fetchFolders();
        toast.success("Votre dossier a été bien créé");
      } else {
        toast.error("Une erreur s'est produite");
      }
    } catch (error) {
      toast.error("Une erreur s'est produite");
      console.log(error);
    }
  };

  const archiveDoc = async () => {
    try {
      const res = await createDocument(docData, selectedFiles[0]);
      if (res.status === 201) {
        toast.success("Le dossier a été bien archivé");
        if (uploadFileRef.current) {
          uploadFileRef.current.close();
        }
      } else {
        toast.error("Une erreur s'est produite");
      }
    } catch (error) {
      console.log(error);
      toast.error("Une erreur s'est produite");
    }
  };
  const navigate = useNavigate();


  useEffect(() => {
    fetchFolders();
  }, []);

  const { getRootProps, getInputProps, isDragActive } = useDropzone({
    onDrop,
    accept: {
      'application/pdf': ['.pdf'],
      'application/vnd.openxmlformats-officedocument.wordprocessingml.document': ['.docx'],
      'application/msword': ['.doc'],
      'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet': ['.xlsx'],
      'text/csv': ['.csv'],
      'application/vnd.ms-excel': ['.xls'],
      'application/vnd.openxmlformats-officedocument.presentationml.presentation': ['.pptx'],
      'application/vnd.ms-powerpoint': ['.ppt'],
    }
  });

  return (
    <div className='flex flex-col flex-grow py-2'>
      <div className="breadcrumbs text-sm">
        <ul>
          <li><Link to="/">Sige Archive</Link></li>
          <li>Tableau de bord</li>
        </ul>
      </div>
      <div className='flex items-end flex-grow justify-end mb-3'>
        <button onClick={() => document.getElementById('uploadFile').showModal()} className="btn btn-sm bg-primary text-white hover:bg-primary">
          <LuUploadCloud />
          Archiver un document
        </button>
      </div>
      <Cards />
      <div className=''>
        <div className='flex items-end justify-end'>
          <button onClick={() => document.getElementById('createFolder').showModal()} className='btn btn-sm bg-primary hover:bg-primary text-white'>
            <LuPlus />
            Nouveau dossier
          </button>
        </div>
        <div className='grid grid-cols-8 justify-start w-full'>
          {dossiers.map((dossier, k) => (
            <ContextMenu className="" >
              <ContextMenuTrigger>
                <Link to={'folder/' + dossier.id} key={k} className='flex hover:bg-orange-400/30 rounded-lg p-2 duration-500 items-center flex-col font-semibold'>
                  <LuFolder size={100} />
                  {dossier.label}
                </Link>
              </ContextMenuTrigger>
              <ContextMenuContent className="w-64">
              <ContextMenuItem inset className="cursor-pointer" onClick={()=>{navigate('folder/' + dossier.id)}}>
                  Ouvrir le dossier
                  <ContextMenuShortcut><LuBookOpen/></ContextMenuShortcut>
                </ContextMenuItem>
                <ContextMenuItem inset className="cursor-pointer">
                  Partager le dossier
                  <ContextMenuShortcut><LuShare2/></ContextMenuShortcut>
                </ContextMenuItem>
                <ContextMenuItem inset className="cursor-pointer">
                  Renommer le dossier
                  <ContextMenuShortcut><LuFileEdit/></ContextMenuShortcut>
                </ContextMenuItem>
                <ContextMenuItem inset className="text-red-500 hover:text-red-500 hover:bg-red-300/50 cursor-pointer">
                  <div >
                  Supprimer le dossier
                  </div>
                  <ContextMenuShortcut><LuTrash2/></ContextMenuShortcut>
                </ContextMenuItem>
              </ContextMenuContent>
            </ContextMenu>
          ))}
        </div>
      </div>
      <dialog id="createFolder" className="modal">
        <div className="modal-box w-3/4">
          <form method="dialog" className='flex justify-end'>
            <button className='btn btn-ghost'><IoClose /></button>
          </form>
          <div className='py-4'>
            <form onSubmit={createFolder} method="post">
              <div className="form-control mb-3">
                <label htmlFor="name" className='mb-1'>Nom du dossier</label>
                <input type="text" id='name' name='label' onChange={(e) => getFormData(e, setFolderData)} placeholder="Informatique" className="input input-bordered w-full" />
              </div>
              <div className="modal-action">
                <button className='btn bg-primary hover:bg-primary text-white'>
                  Créer un nouveau dossier
                </button>
              </div>
            </form>
          </div>
        </div>
      </dialog>

      <dialog ref={uploadFileRef} id="uploadFile" className="modal">
        <div className="modal-box w-3/4 max-w-xl">
          <h3 className="font-bold text-lg">
            Archiver un document
          </h3>
          <div className="py-4">
            <div {...getRootProps()} className='border-2 relative border-dashed border-primary p-2 h-48 rounded-lg'>
              <input {...getInputProps()} />
              <div className="flex items-center flex-col gap-2 justify-center md:py-8 text-center">
                <LuUploadCloud className='text-primary' size={60} />
                {isDragActive ?
                  <div className='absolute top-0 rounded-md bg-gray-100 flex items-center justify-center text-primary w-full h-full text-center'>
                    Déposer le fichier ici...
                  </div> :
                  <div className='flex items-center flex-col justify-center'>
                    <div>
                      Documents acceptés <span className='font-bold'>(.pdf, .doc, .docx, .xlsx, .csv, .xls, .ppt, .pptx)</span>
                    </div>
                    <p>
                      Glisser et déposer vos documents ici
                    </p>
                  </div>
                }
              </div>
            </div>
            {selectedFiles.length > 0 && (
              <div className='mt-4'>
                <h4 className='font-bold'>Fichiers sélectionnés:</h4>
                <ul>
                  {selectedFiles.map((file, index) => (
                    <li key={index}>
                      <p>Fichier: {file.name}</p>
                      <p>Taille: {file.size > 1024 * 1024 ? (file.size / (1024 * 1024)).toFixed(2) + ' Mo' : (file.size / 1024).toFixed(2) + ' Ko'}</p>
                      <p>Dernière modification: {new Date(file.lastModified).toLocaleDateString()}</p>
                    </li>
                  ))}
                </ul>
              </div>
            )}
          </div>

          <div className='form-control'>
            <div className="label">
              <span className="label-text">Titre</span>
            </div>
            <input type="text" value={docData.titre} name='titre' onChange={(e) => getFormData(e, setDocData)} placeholder="Titre" className="input input-bordered w-full " />
          </div>
          <div className='form-control'>
            <div className="label">
              <span className="label-text">Auteur</span>
            </div>
            <input type="text" name='auteur' value={docData.auteur} onChange={(e) => getFormData(e, setDocData)} placeholder="Auteur" className="input input-bordered w-full" />
          </div>

          <div className="form-control">
            <label className="label">
              <span className="label-text">Catégorie</span>
            </label>
            <select
              name="category_id"
              value={docData.category_id}
              onChange={(e) => getFormData(e, setDocData)}
              className="select select-bordered"
              required
            >
              <option value="">Sélectionner une catégorie</option>
              {dossiers.map((dos, k) => (
                <option key={k} value={dos.id}>{dos.label}</option>
              ))}
            </select>
          </div>
          <div className="form-control">
            <div className="label">
              <span className="label-text">Référence</span>
            </div>
            <input type="text" name='reference' value={docData.reference} onChange={(e) => getFormData(e, setDocData)} placeholder="CM-0166" className="input input-bordered w-full" />
          </div>
          <div className="form-control">
            <div className="label">
              <span className="label-text">Résumé du document</span>
            </div>
            <textarea
              placeholder="Résumé"
              name='resume'
              value={docData.resume}
              onChange={(e) => getFormData(e, setDocData)}
              className="textarea textarea-bordered textarea-sm w-full"
            ></textarea>
          </div>
          <div className="modal-action">
            <form method="dialog">
              <button className="btn">Fermer</button>
            </form>
            <button onClick={archiveDoc} className='btn bg-primary hover:bg-primary text-white'>
              Archiver maintenant
            </button>
          </div>
        </div>
      </dialog>
    </div>
  );
}

export default Home;
