import React from 'react'

export default function GymDisciplines({gym}) {
    return (
        <div className='w-10/12 mx-auto'>
            <h1 className='text-6xl font-bold'>{gym.name}</h1>
        </div>
    )
}
