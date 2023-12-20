import React from 'react'

export default function GymShow({ gym }) {
    console.log(gym)
    return (
        <div className="w-10/12 mx-auto">
            <h1 className="text-3xl font-bold">{gym.name}</h1>
            <ul className='list-disc'>
                {gym.disciplines.map(discipline => (
                    <li key={discipline.id}>{discipline.discipline}</li>
                ))}
            </ul>
        </div>
    )
}
