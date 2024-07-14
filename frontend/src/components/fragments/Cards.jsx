import React from 'react'
import Card from '../Card'
import { LuUsers } from 'react-icons/lu'

function Cards() {
    return (
        <div className='grid md:grid-cols-4 grid-cols-1 gap-5 mb-8'>
            <Card>
                <div className='flex flex-col items-start gap-2'>
                    <div className='flex items-center gap-3'>
                        <div className='bg-primary p-2 rounded text-white'>
                            <LuUsers size={25} />
                        </div>
                        <div>
                            <p className='text-lg font-semibold'> Utilisateurs</p>
                            <p>
                                86
                            </p>
                        </div>
                    </div>

                </div>

            </Card>
            <Card />
            <Card />
            <Card />
        </div>
    )
}

export default Cards