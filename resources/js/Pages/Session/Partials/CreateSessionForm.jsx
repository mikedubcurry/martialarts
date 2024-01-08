import { useForm } from '@inertiajs/react';
import { useEffect, useState } from 'react';

export default function CreateSessionForm({ gyms }) {
    const [prompts, setPrompts] = useState([]);
    const [disciplines, setDisciplines] = useState([]);
    const { data, setData, post, processing, errors, reset } = useForm({
        date: '',
        discipline_id: '',
        gym_id: '',
        start_time: '',
        end_time: '',
        notes: '',
        prompts: [],
    });

    const handleGymChange = (e) => {
        setData('gym_id', e.target.value);
        setDisciplines(gyms.find(gym => gym.id === parseInt(e.target.value)).disciplines);
    };

    const handleDisciplineChange = (e) => {
        setData('discipline_id', e.target.value);
        setPrompts(disciplines.find(discipline => discipline.id === parseInt(e.target.value)).prompts);
    };

    useEffect(() => {
        if (!data.discipline_id) return;
        fetch(`http://localhost/api/prompts/${data.discipline_id}`, { headers: { "Content-Type": "application/json", Accept: "application/json" } })
            .then(response => response.json())
            .then(data => setPrompts(data.prompts));
    }, [data.discipline_id])

    const submit = (e) => {
        e.preventDefault();
        post('/sessions', {
            onSuccess: () => console.log('success'),
        });
    };

    const handlePromptChange = (e) => {
        const promptId = parseInt(e.target.dataset.prompt);
        let promptHasData = data.prompts.find(prompt => prompt.id === parseInt(promptId));

        if (promptHasData) {
            promptHasData.answer = e.target.value;
            return setData('prompts', data.prompts);
        } else {
            return setData('prompts', [...data.prompts, { id: promptId, answer: e.target.value }]);
        }
    };

    return (
        <form onSubmit={submit} className=' max-w-lg border flex flex-col gap-6 mx-auto'>
            <label className='flex flex-col gap-2'>
                <span className='font-bold text-lg'>Date</span>
                <input className='' type='date' name='date' value={data.date} onChange={e => setData('date', e.target.value)} />
            </label>
            <label className='flex flex-col gap-2'>
                <span className='font-bold text-lg'>Start Time</span>
                <input className='' type='time' name='start_time' value={data.start_time} onChange={e => setData('start_time', e.target.value)} />
            </label>
            <label className='flex flex-col gap-2'>
                <span className='font-bold text-lg'>End Time</span>
                <input className='' type='time' name='end_time' value={data.end_time} onChange={e => setData('end_time', e.target.value)} />
            </label>
            <label className='flex flex-col gap-2'>
                <span className='font-bold text-lg'>Gym</span>
                <select className='' name='gym_id' value={data.gym_id} onChange={handleGymChange}>
                    <option value=''>Select a Gym</option>
                    {gyms.map((gym) => (
                        <option key={gym.id} value={gym.id}>{gym.name}</option>
                    ))}
                </select>
            </label>
            <label className='flex flex-col gap-2'>
                <span className='font-bold text-lg'>Discipline</span>
                <select className='' name='discipline_id' value={data.discipline_id} onChange={handleDisciplineChange}>
                    <option value=''>Select a Discipline</option>
                    {disciplines.map((discipline) => (
                        <option key={discipline.id} value={discipline.id}>{discipline.discipline}</option>
                    ))}
                </select>
            </label>

            {prompts.map(({ prompt, id }) => (
                <label className='flex flex-col gap-2' key={id}>
                    <span className='font-bold text-lg'>{prompt}</span>
                    <input data-prompt={id} className='' type='text' onChange={handlePromptChange} />
                </label>
            ))}

            <label className='flex flex-col gap-2'>
                <span className='font-bold text-lg'>Notes</span>
                <textarea className='' name='notes' value={data.notes} onChange={e => setData('notes', e.target.value)} />
            </label>
            <button className='' type='submit' disabled={processing}>Submit</button>
        </form>
    )
}
