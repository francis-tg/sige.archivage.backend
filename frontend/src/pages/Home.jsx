import React, { useCallback } from 'react'
import { useDropzone } from 'react-dropzone'
import Cards from '../components/fragments/Cards'
import { LuUploadCloud } from 'react-icons/lu'

function Home() {
  const onDrop = useCallback(acceptedFiles => {
    // Do something with the files
    console.log(acceptedFiles)
  }, [])
  const { getRootProps, getInputProps, isDragActive } = useDropzone({ onDrop })
  return (
    <div className='flex flex-col flex-grow py-2'>
      <div className='flex items-end flex-grow justify-end mb-3'>
        <button onClick={() => document.getElementById('uploadFile').showModal()} className="btn bg-primary text-white hover:bg-primary">
          <LuUploadCloud />
          Archiver un document
        </button>
      </div>
      <Cards />

      <dialog id="uploadFile" className="modal">
        <div className="modal-box w-3/4 max-w-xl">
          <h3 className="font-bold text-lg">
            Archiver un document
          </h3>
          <div className="py-4">
            <div {...getRootProps()} className='border-2 relative border-dashed border-primary p-2 h-48 rounded-lg'>
              <input {...getInputProps()} />
              <div className="flex items-center flex-col gap-2 justify-center md:py-8 text-center">
                <LuUploadCloud className='text-primary' size={60} />
                {
                  isDragActive ?
                    <div className='absolute top-0 rounded-md bg-gray-100 flex items-center justify-center text-primary w-full h-full text-center'>
                      Déposer le fichier ici...
                    </div> :
                    (
                      <div className='flex items-center flex-col justify-center'>
                        <div>
                          Documents acceptées <span className='font-bold'>(.pdf,.docs,.xlsx,.csv,.ppt)</span>
                        </div>
                        <p>
                          Glisser et déposer vos documents ici
                        </p>
                      </div>
                    )

                }
              </div>
            </div>
          </div>
          <div className='flex flex-col md:flex-row items-center gap-3'>
            <div>
              <div className="label">
                <span className="label-text">Titre</span>
              </div>
              <input type="text" placeholder="Titre" className="input input-bordered w-full " />
            </div>
            <div>
              <div className="label">
                <span className="label-text">Auteur</span>
              </div>
              <input type="text" placeholder="Auteur" className="input input-bordered w-full" />
            </div>
          </div>
          <div>
            <div className="label">
              <span className="label-text">Emplacement</span>
            </div>
            <input type="text" placeholder="Emplacement" className="input input-bordered w-full" />
          </div>
          <div>
            <div className="label">
              <span className="label-text">Référence</span>
            </div>
            <input type="text" placeholder="Auteur" className="input input-bordered w-full" />
          </div>
          <div>
            <div className="label">
              <span className="label-text">Résumé du document</span>
            </div>
            <textarea
              placeholder="Résumé"
              className="textarea textarea-bordered textarea-sm w-full"></textarea>
          </div>
          <div className="modal-action">
            <form method="dialog">
              {/* if there is a button in form, it will close the modal */}
              <button className="btn">Fermer</button>
            </form>
            <button className='btn bg-primary hover:bg-primary text-white'>
              Archiver maintenant
            </button>

          </div>
        </div>
      </dialog>
    </div>
  )
}

export default Home