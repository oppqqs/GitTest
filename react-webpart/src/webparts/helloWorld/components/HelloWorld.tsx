import * as React from 'react';
import styles from './HelloWorld.module.scss';
import { IHelloWorldProps } from './IHelloWorldProps';
import { escape } from '@microsoft/sp-lodash-subset';

import { SPHttpClient, SPHttpClientResponse, ISPHttpClientOptions } from '@microsoft/sp-http';

export interface IContactsService{
    getContacts():Promise<Contact[]>;
    saveContact(contact:Contact):Promise<Contact[]>;
    deleteContact(contact:Contact): Promise<Contact[]>;
    addContact():Promise<Contact[]>;
}


export class MockContactsService implements IContactsService{
    private contacts:Contact[];

    constructor(){
        this.contacts = new Array();
        this.contacts.push(new Contact(1, "Cox", "Brian",...));
        this.contacts.push(new Contact(2, "Doyle", "Patricia",...));
        this.contacts.push(new Contact(3, "Yali", "David",...));
    }
    this.contactsService = (Environment.type === EnvironmentType.Local) ?
    new MockContactsService(): new ContactsService(this.context);

    public getContacts(): Promise<Contact[]>{
        let url = this.webAbsoluteUrl + "/_api/Lists/getByTitle('Contacts')/items?$select=Id,Title,FirstName,";
        this.contacts = [];

        return this.httpClient.get(url, SPHttpClient.configurations.v1)
        .then((response: SPHttpClientResponse) => {
            return response.json().then((data) => {
                data.value.forEach(c => {
                this.contacts.push(new Contact(c.Id,c.Title,c.FirstName));
            });
          return this.contacts;
        });
        });
    }
    this.contactsService.getContacts().then((contacts) => {
        this.context.statusRenderer.clearLoadingIndicator(this.domElement);
        ReactDom.render(React.createElement(CrudSheet, { "contacts": contacts}),
    this.domElement);
    });

}
export default class HelloWorld extends React.Component<IHelloWorldProps, {}> {
  // public getContacts(): Promise<Contact[]>{
  //   let url = this.webAbsoluteUrl + "/_api/Lists/getByTitle('Contacts')/items?$select=Id,Title,FirstName,";
  //   this.contacts = [];

  //   return this.httpClient.get(url, SPHttpClient.configurations.v1)
  //   .then((response: SPHttpClientResponse) => {
  //       return response.json().then((data) => {
  //           data.value.forEach(c => {
  //           this.contacts.push(new Contact(c.Id,c.Title,c.FirstName));
  //       });
  //      return this.contacts;
  //   });
  //   });
  // }

  public render(): React.ReactElement<IHelloWorldProps> {
    return (
      <div className={ styles.helloWorld }>
        <div className={ styles.container }>
          <div className={ styles.row }>
            <div className={ styles.column }>
              <span className={ styles.title }>Welcome to SharePoint!</span>
              <p className={ styles.subTitle }>Customize SharePoint experiences using Web Parts.</p>
              <p className={ styles.description }>{escape(this.props.description)}</p>
              <a href="https://aka.ms/spfx" className={ styles.button }>
                <span className={ styles.label }>Learn more</span>
              </a>
            </div>
          </div>
        </div>
      </div>
    );
  }
}
