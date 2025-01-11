<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Customer;
use Livewire\WithPagination;

class CustomerManagement extends Component
{
    use WithPagination;

    public $first_name, $last_name, $age, $dob, $email, $customer_id;
    public $isEditMode = false;

    public function render()
    {
        return view('livewire.customer-management', [
            'customers' => Customer::paginate(10),
        ]);
    }

    public function store()
    {
        $this->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'age' => 'required|integer',
            'dob' => 'required|date',
            'email' => 'required|email|unique:customers',
        ]);

        Customer::create([
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'age' => $this->age,
            'dob' => $this->dob,
            'email' => $this->email,
        ]);

        session()->flash('message', 'Customer created successfully.');
        $this->resetFields();
    }

    public function edit($id)
    {
        $customer = Customer::findOrFail($id);
        $this->customer_id = $customer->id;
        $this->first_name = $customer->first_name;
        $this->last_name = $customer->last_name;
        $this->age = $customer->age;
        $this->dob = $customer->dob;
        $this->email = $customer->email;

        $this->isEditMode = true;
    }

    public function update()
    {
        $this->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'age' => 'required|integer',
            'dob' => 'required|date',
            'email' => 'required|email|unique:customers,email,' . $this->customer_id,
        ]);

        $customer = Customer::findOrFail($this->customer_id);
        $customer->update([
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'age' => $this->age,
            'dob' => $this->dob,
            'email' => $this->email,
        ]);

        session()->flash('message', 'Customer updated successfully.');
        $this->resetFields();
    }

    public function delete($id)
    {
        Customer::findOrFail($id)->delete();
        session()->flash('message', 'Customer deleted successfully.');
    }

    private function resetFields()
    {
        $this->first_name = '';
        $this->last_name = '';
        $this->age = '';
        $this->dob = '';
        $this->email = '';
        $this->isEditMode = false;
    }
}
