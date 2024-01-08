import { router } from "@inertiajs/react"
import { useState } from "react"

export default function ViewSessionModal({ session, close }) {
    console.log(session)
    const [editing, setEditing] = useState(false)
    const [newNote, setNewNote] = useState(session.notes?.note || '')
    const handleDelete = () => {
        router.delete(`/sessions/${session.id}`, {
            onSuccess: () => {
                console.log('success')
                close()
            }
        })
    }
    const handleEdit = () => {
        if (editing) {
            router.patch(`/sessions/${session.id}`, {
                notes: newNote,
                onSuccess: () => {
                    console.log('success')
                    close()
                }
            })
        }
        setEditing(!editing)
    }
    return (
        <>
            <div onClick={() => close()} className='fixed top-0 left-0 w-full h-full bg-black bg-opacity-50 z-50'></div>
            <div className='p-8 rounded-xl fixed top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 bg-white z-50'>
                <div className='flex justify-between items-center'>
                    <h2 className='text-2xl font-bold'>Session Details</h2>
                    <button onClick={() => close()} className='text-2xl font-bold'>X</button>
                </div>
                <div className='mt-4'>
                    <p className='text-xl font-bold'>{session.discipline.discipline}</p>
                    <p className='text-xl font-bold'>{session.date}</p>
                    <p className='text-xl font-bold'>{session.start_time} - {session.end_time}</p>
                    <p className='text-xl font-bold'>{session.gym.name}</p>
                </div>
                <div className='mt-4'>
                    <h3 className='text-xl font-bold'>Notes</h3>
                    {editing ? (<textarea value={newNote} onChange={e => setNewNote(e.target.value)} ></textarea>) : (<p>{session.notes?.note}</p>)}
                </div>
                <div className='mt-4'>
                    {session.prompt_answers?.map(({ id, answer, prompt }) => (
                        <div key={id}>
                            <h3 className='text-xl font-bold'>{prompt.prompt}</h3>
                            <p>{answer}</p>
                        </div>
                    ))}
                </div>
                <div className='mt-4'>
                    <button onClick={handleEdit} className='bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded'>{editing ? 'Save' : 'Edit'}</button>
                    <button onClick={handleDelete} className='bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded'>Delete</button>
                </div>
            </div>
        </>
    )
}
